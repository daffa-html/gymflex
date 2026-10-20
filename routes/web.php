<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandAmbassadorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{slug}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/brand-ambassador', [BrandAmbassadorController::class, 'index'])->name('brand-ambassador.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak/kirim', [ContactController::class, 'kirim'])->name('kontak.kirim');
