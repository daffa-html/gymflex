<?php

namespace Tests\Feature;

use App\Filament\Resources\BrandAmbassadorResource\Pages\CreateBrandAmbassador;
use App\Filament\Resources\BrandAmbassadorResource\Pages\EditBrandAmbassador;
use App\Filament\Resources\GaleriResource\Pages\CreateGaleri;
use App\Filament\Resources\GaleriResource\Pages\EditGaleri;
use App\Filament\Resources\KategoriProdukResource\Pages\CreateKategoriProduk;
use App\Filament\Resources\KategoriProdukResource\Pages\EditKategoriProduk;
use App\Filament\Resources\PesanKontakResource\Pages\EditPesanKontak;
use App\Filament\Resources\PesanKontakResource\Pages\ListPesanKontaks;
use App\Filament\Resources\PesanKontakResource\PesanKontakResource;
use App\Filament\Resources\ProdukResource\Pages\CreateProduk;
use App\Filament\Resources\ProdukResource\Pages\EditProduk;
use App\Models\BrandAmbassador;
use App\Models\Galeri;
use App\Models\KategoriProduk;
use App\Models\PesanKontak;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class FilamentCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create([
            'email' => 'admin@gymflex.co.id',
        ]));
    }

    public function test_kategori_produk_create_edit_delete(): void
    {
        Livewire::test(CreateKategoriProduk::class)
            ->assertSee('Informasi Kategori')
            ->assertSee('Detail Lainnya')
            ->set('data.nama', 'Tes Kategori')
            ->set('data.slug', 'tes-kategori')
            ->set('data.deskripsi', 'Kategori untuk pengujian')
            ->call('create')
            ->assertHasNoFormErrors();

        $kategori = KategoriProduk::where('slug', 'tes-kategori')->firstOrFail();
        $this->assertSame('Tes Kategori', $kategori->nama);

        Livewire::test(EditKategoriProduk::class, ['record' => 'tes-kategori'])
            ->set('data.nama', 'Tes Kategori Diubah')
            ->call('save')
            ->assertHasNoFormErrors();

        $kategori = $kategori->fresh();
        $this->assertSame('Tes Kategori Diubah', $kategori->nama);
        $this->assertSame('tes-kategori-diubah', $kategori->slug);

        Livewire::test(EditKategoriProduk::class, ['record' => $kategori->slug])
            ->callAction('delete');

        $this->assertDatabaseMissing('kategori_produk', ['slug' => 'tes-kategori']);
    }

    public function test_produk_create_edit(): void
    {
        $kategori = KategoriProduk::create([
            'nama' => 'Cardio',
            'slug' => 'cardio',
        ]);

        Livewire::test(CreateProduk::class)
            ->assertSee('Informasi Produk')
            ->assertSee('Detail Lainnya')
            ->set('data.kategori_id', $kategori->id)
            ->set('data.nama', 'Produk Tes Unit')
            ->set('data.slug', 'produk-tes-unit')
            ->set('data.harga', 999000)
            ->set('data.stok', 7)
            ->set('data.deskripsi', 'Dibuat oleh feature test')
            ->call('create')
            ->assertHasNoFormErrors();

        $produk = Produk::where('slug', 'produk-tes-unit')->firstOrFail();
        $this->assertSame(999000, (int) $produk->harga);
        $this->assertSame(7, $produk->stok);

        Livewire::test(EditProduk::class, ['record' => 'produk-tes-unit'])
            ->set('data.stok', 42)
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame(42, $produk->fresh()->stok);
    }

    public function test_galeri_create_edit_delete_with_image(): void
    {
        Storage::fake('public');

        Livewire::test(CreateGaleri::class)
            ->assertSee('Informasi Galeri')
            ->assertSee('Detail Lainnya')
            ->set('data.judul', 'Galeri Tes Unit')
            ->set('data.kategori', 'foto')
            ->set('data.gambar', UploadedFile::fake()->image('tes.jpg'))
            ->set('data.deskripsi', 'Dibuat oleh feature test')
            ->call('create')
            ->assertHasNoFormErrors();

        $galeri = Galeri::where('judul', 'Galeri Tes Unit')->firstOrFail();
        $this->assertNotEmpty($galeri->gambar);

        Livewire::test(EditGaleri::class, ['record' => $galeri->getKey()])
            ->set('data.judul', 'Galeri Tes Unit Diubah')
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Galeri Tes Unit Diubah', $galeri->fresh()->judul);

        Livewire::test(EditGaleri::class, ['record' => $galeri->getKey()])
            ->callAction('delete');

        $this->assertDatabaseMissing('galeri', ['judul' => 'Galeri Tes Unit Diubah']);
    }

    public function test_brand_ambassador_create_edit_delete(): void
    {
        Livewire::test(CreateBrandAmbassador::class)
            ->assertSee('Informasi Ambassador')
            ->assertSee('Detail Lainnya')
            ->set('data.nama', 'Tes Ambassador')
            ->set('data.profesi', 'Atlet')
            ->set('data.bio', 'Bio untuk pengujian')
            ->set('data.instagram', '@tes')
            ->set('data.urutan', 9)
            ->call('create')
            ->assertHasNoFormErrors();

        $ba = BrandAmbassador::where('nama', 'Tes Ambassador')->firstOrFail();

        Livewire::test(EditBrandAmbassador::class, ['record' => $ba->getKey()])
            ->set('data.profesi', 'Pelatih')
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Pelatih', $ba->fresh()->profesi);

        Livewire::test(EditBrandAmbassador::class, ['record' => $ba->getKey()])
            ->callAction('delete');

        $this->assertDatabaseMissing('brand_ambassadors', ['nama' => 'Tes Ambassador']);
    }

    public function test_pesan_kontak_edit_and_no_create_button(): void
    {
        $this->assertFalse(PesanKontakResource::canCreate());

        Livewire::test(ListPesanKontaks::class)
            ->assertDontSee('Buat Pesan Kontak');

        $this->get('/admin/pesan-kontaks/create')->assertNotFound();

        $pesan = PesanKontak::create([
            'nama' => 'Tes Pengguna',
            'email' => 'tes@pengguna.id',
            'subjek' => 'Subjek Tes',
            'pesan' => 'Isi pesan pengujian',
            'sudah_dibaca' => false,
        ]);

        Livewire::test(EditPesanKontak::class, ['record' => $pesan->getKey()])
            ->assertSee('Informasi Pengirim')
            ->assertSee('Isi Pesan')
            ->set('data.sudah_dibaca', true)
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertTrue((bool) $pesan->fresh()->sudah_dibaca);
    }

    public function test_contact_form_persists_to_database(): void
    {
        $response = $this->from('/contact')->post('/kontak/kirim', [
            '_token' => csrf_token(),
            'nama' => 'Pengujian Kontak',
            'email' => 'kontak@tes.id',
            'subjek' => 'Subjek Kontak',
            'pesan' => 'Pesan dari feature test',
        ]);

        $response->assertRedirect('/contact');
        $this->assertDatabaseHas('pesan_kontak', [
            'email' => 'kontak@tes.id',
            'subjek' => 'Subjek Kontak',
        ]);
    }

    public function test_public_pages_render_from_database(): void
    {
        $kategori = KategoriProduk::create([
            'nama' => 'Cardio',
            'slug' => 'cardio',
        ]);

        Produk::create([
            'kategori_id' => $kategori->id,
            'nama' => 'Treadmill Spesial',
            'slug' => 'treadmill-spesial',
            'harga' => 15000000,
            'stok' => 10,
            'deskripsi' => 'Treadmill untuk pengujian',
            'gambar' => 'produk/treadmill-pro-x500.svg',
            'status' => true,
        ]);

        $this->get('/')->assertOk()->assertSee('Treadmill Spesial');
        $this->get('/produk')->assertOk()->assertSee('Treadmill Spesial');
        $this->get('/produk?kategori=cardio')->assertOk()->assertSee('Treadmill Spesial');
        $this->get('/produk/treadmill-spesial')->assertOk()->assertSee('Treadmill Spesial');
        $this->get('/gallery')->assertOk();
        $this->get('/brand-ambassador')->assertOk();
        $this->get('/about')->assertOk();
        $this->get('/contact')->assertOk();
    }
}
