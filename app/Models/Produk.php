<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = ['kategori_id', 'nama', 'slug', 'harga', 'stok', 'gambar', 'deskripsi', 'status'];

    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer',
        'status' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getFormattedHargaAttribute(): string
    {
        return 'Rp '.number_format($this->harga, 0, ',', '.');
    }
}
