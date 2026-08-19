<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinkEngineController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes – Kartu Review Pintar NFC & QR
|--------------------------------------------------------------------------
*/

// ── Halaman utama (opsional landing page) ──────────────────────────────
Route::get('/', function () {
    return view('welcome');
});

// ── Route Admin: Mass Generation Slug (dilindungi secret key) ──────────
Route::get('/admin/generate', [AdminController::class, 'generate'])
    ->name('admin.generate');

// ── Core Link Engine Routes ────────────────────────────────────────────
// GET  /{slug}      → tampilkan form aktivasi atau redirect ke GMB
// POST /{slug}      → proses aktivasi kartu
// GET  /{slug}/edit → tampilkan form verifikasi PIN
// POST /{slug}/edit → proses verifikasi PIN & update URL

Route::get('/{slug}', [LinkEngineController::class, 'show'])
    ->name('link.show')
    ->where('slug', '[a-zA-Z0-9]+');

Route::post('/{slug}', [LinkEngineController::class, 'activate'])
    ->name('link.activate')
    ->where('slug', '[a-zA-Z0-9]+');

Route::get('/{slug}/edit', [LinkEngineController::class, 'editVerify'])
    ->name('link.edit.verify')
    ->where('slug', '[a-zA-Z0-9]+');

Route::post('/{slug}/edit', [LinkEngineController::class, 'editUpdate'])
    ->name('link.edit.update')
    ->where('slug', '[a-zA-Z0-9]+');
