<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\Payment\TransactionController;

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
// Route::get('/segerahadir', function () {
//     return view('segeraHadir.index');
// });
// Route::get('/bioskop', function () {
//     return view('bioskop.index');
// });
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });


require __DIR__.'/auth.php';
// Route::get('/dashboard', [FilmController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource('/dbfilm', FilmController::class)->middleware('auth');
Route::resource('/dbbioskop', BioskopController::class)->middleware('auth');

Route::get('/pilihpembayaran/{id}', [BioskopController::class, 'pilih']);
Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');

Route::resource('/dbdata', DataController::class)->middleware('auth');
Route::get('/', [DataController::class, 'home']);
Route::get('/tayangsekarang', [DataController::class, 'tayangSekarang']);
Route::get('/segerahadir', [DataController::class, 'segeraHadir']);
Route::get('/bioskop', [DataController::class, 'bioskop']);
Route::get('/bioskop/{id}', [DataController::class, 'showBioskop']);
Route::get('/{id}', [DataController::class, 'showHome']);
// Route::post('/logout', [Auth\AuthenticatedSessionController::class, 'destroy']);
