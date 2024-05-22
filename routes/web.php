<?php

use App\Http\Controllers\Admin\AjukanSertifikatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InspeksiController;
use App\Http\Controllers\Admin\InspektorController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\SertifikatController;
use App\Http\Controllers\Admin\VerifiedController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/daftar-kendaraan', [FrontendController::class, 'daftarkendaraan'])->name('daftar-kendaraan');
Route::get('/pengajuan-sertifikat', [FrontendController::class, 'pengajuansertifikat'])->name('pengajuan-sertifikat');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
    // Route::post('/cart/{id}', [FrontendController::class, 'cartAdd'])->name('cart-add');
    // Route::delete('/cart/{id}', [FrontendController::class, 'cartDelete'])->name('cart-delete');
    // Route::post('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
    // Route::get('/checkout/success', [FrontendController::class, 'success'])->name('checkout-success');
    Route::post('/daftar', [FrontendController::class, 'storekendaraan'])->name('store.kendaraan');
    Route::post('/pengajuan', [FrontendController::class, 'storesertifikat'])->name('store.pengajuan');

    Route::post('/search-sertifikat', [FrontendController::class, 'index'])->name('search.sertifikat');
    Route::name('dashboard.')->prefix('dashboard')->group(function () {



        Route::middleware(['admin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::resource('kendaraan', KendaraanController::class);
            Route::resource('verified', VerifiedController::class);
            Route::resource('sertifikat', SertifikatController::class);
            Route::resource('inspektor', InspektorController::class);
            Route::resource('pengajuan', AjukanSertifikatController::class);
            Route::patch('/pengajuan/{pengajuan}/accept', [AjukanSertifikatController::class, 'accept'])->name('pengajuan.accept');
            Route::patch('/pengajuan/{pengajuan}/unaccept', [AjukanSertifikatController::class, 'unaccept'])->name('pengajuan.unaccept');
            Route::resource('inspeksi', InspeksiController::class);
            Route::patch('/kendaraan/{kendaraan}/verify', [KendaraanController::class, 'verify'])->name('kendaraan.verify');
            Route::patch('/kendaraan/{kendaraan}/unverify', [KendaraanController::class, 'unverify'])->name('kendaraan.unverify');
            Route::get('/laporan-kendaraan', [LaporanController::class, 'laporankendaraan'])->name('laporan.kendaraan');
            Route::get('/laporan-inspeksi', [LaporanController::class, 'laporaninspeksi'])->name('laporan.inspeksi');
        });
    });
});
