<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\Admin\UndanganController;
use App\Http\Controllers\Standard\AuraSilverController;
use App\Http\Controllers\Standard\PlatinumLiteController;
use App\Http\Controllers\Standard\SereneGlowController;
use App\Http\Controllers\Standard\SerenityLuxeController;
use App\Http\Controllers\Basic\CoreSeriesController;
use App\Http\Controllers\Basic\ModernaLiteController;
use App\Http\Controllers\Basic\PrimaryLoveController;
use App\Http\Controllers\Basic\StellarGraceController;
use App\Http\Controllers\Basic\PlatinumMinimalController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// ========== AUTH ==========
Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========== PUBLIC ==========
Route::get('/', [KatalogController::class, 'index'])->name('katalog.index');
// Route::get('/undangan/{slug}', [KatalogController::class, 'show'])->name('katalog.show');
Route::get('/template/{slug}', [KatalogController::class, 'detail'])->name('template.detail');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
Route::get('/pesan-custom', function () {
    return view('katalog.custom-order');
})->name('custom.order');

// ========== ADMIN ==========
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/undangan', [UndanganController::class, 'index'])->name('undangan.index');
    Route::get('/undangan/create', [UndanganController::class, 'create'])->name('undangan.create');
    Route::post('/undangan', [UndanganController::class, 'store'])->name('undangan.store');
    Route::get('/undangan/{undangan}/edit', [UndanganController::class, 'edit'])->name('undangan.edit');
    Route::put('/undangan/{undangan}', [UndanganController::class, 'update'])->name('undangan.update');
    Route::delete('/undangan/{undangan}', [UndanganController::class, 'destroy'])->name('undangan.destroy');
    Route::patch('/undangan/{undangan}/toggle-status', [UndanganController::class, 'toggleStatus'])->name('undangan.toggle-status');
    Route::patch('/undangan/{undangan}/toggle-populer', [UndanganController::class, 'togglePopuler'])->name('undangan.toggle-populer');
});

// ========== TEMPLATE BASIC ==========
Route::prefix('template/basic')->name('template.basic.')->group(function () {
    Route::get('/core-series', [CoreSeriesController::class, 'index'])->name('core.series');
    Route::get('/moderna-lite', [ModernaLiteController::class, 'index'])->name('moderna.lite');
    Route::get('/primary-love', [PrimaryLoveController::class, 'index'])->name('primary.love');
    Route::get('/stellar-grace', [StellarGraceController::class, 'index'])->name('stellar.grace');
    Route::get('/platinum-minimal', [PlatinumMinimalController::class, 'index'])->name('platinum.minimal');
});

// ========== TEMPLATE STANDARD ==========
Route::prefix('template/standard')->name('template.standard.')->group(function () {
    Route::get('/aura-silver', [AuraSilverController::class, 'index'])->name('aura.silver');
    Route::get('/platinum-lite', [PlatinumLiteController::class, 'index'])->name('platinum.lite');
    Route::get('/serene-glow', [SereneGlowController::class, 'index'])->name('serene.glow');
    Route::get('/serenity-luxe', [SerenityLuxeController::class, 'index'])->name('serenity.luxe');
});

require __DIR__ . '/auth.php';
