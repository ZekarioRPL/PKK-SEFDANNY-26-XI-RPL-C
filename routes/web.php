<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\Payment\TransactionController;
use App\Http\Controllers\Payment\TripayController;
use App\Http\Controllers\PayTripayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('beranda.index');
// });
// Route::get('/tayangsekarang', function () {
//     return view('tayangSekarang.index');
// });
// Route::get('/history', function () {
//     return view('payment.history', [
//         'title' => "History"
//     ]);
// });
Route::get('/detail', function () {
    return view('payment.detail', [
        'title' => 'Detail Transaction'
    ]);
});
Route::get('/kursi', function () {
    return view('payment.kursi', [
        'title' => "kursi"
    ]);
});
Route::get('/history', [PayTripayController::class, 'history']);

require __DIR__.'/auth.php';
// Route::get('/dashboard', [FilmController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('/dbfilm', FilmController::class)->middleware('auth');
Route::resource('/dbbioskop', BioskopController::class)->middleware('auth');

Route::get('/pilihpembayaran/{id}', [BioskopController::class, 'pilih']);
Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');

Route::get('detail/{reference}', [PayTripayController::class, 'detail'])->name('transaction.show');

Route::resource('/dbdata', DataController::class)->middleware('auth');
Route::get('/', [DataController::class, 'home']);
Route::get('/tayangsekarang', [DataController::class, 'tayangSekarang']);
Route::get('/segerahadir', [DataController::class, 'segeraHadir']);
Route::get('/bioskop', [DataController::class, 'bioskop']);
Route::get('/bioskop/{id}', [DataController::class, 'showBioskop']);
Route::get('/{id}', [DataController::class, 'showHome']);
// Route::post('/logout', [Auth\AuthenticatedSessionController::class, 'destroy']);
