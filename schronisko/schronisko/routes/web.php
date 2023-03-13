<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlownyKontroler;
use App\Http\Controllers\ZwierzetaKontroler;
use App\Http\Controllers\WolontariuszeKontroler;
use App\Http\Controllers\TymczasKontroler;
use App\Http\Controllers\KlienciKontroler;
use App\Http\Controllers\AdopcjeKontroler;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

//Cała reszta gówna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/loguj', [GlownyKontroler::class,'zmienStanUwierzytelnienia']);
Route::get('/wyloguj', [GlownyKontroler::class,'zmienStanUwierzytelnienia']);

Route::get('/zalogowano', [GlownyKontroler::class,'przeniesNaZalogowano']);
require __DIR__.'/auth.php';

//Glowny
Route::get('/', [GlownyKontroler::class,'index']);
Route::get('/domowa', [GlownyKontroler::class,'index']);

//Zwierzeta
Route::get('/zwierzeta/list', [ZwierzetaKontroler::class, 'allZwierzeta']);
Route::get('/zwierzeta/list_cats', [ZwierzetaKontroler::class, 'allKoty']);
Route::get('/zwierzeta/list_dogs', [ZwierzetaKontroler::class, 'allPsy']);
Route::get('/zwierzeta/list_admin', [ZwierzetaKontroler::class, 'allZwierzetaAdmin']) -> middleware('auth');
Route::get('/zwierzeta/edit/{id}', [ZwierzetaKontroler::class, 'edit']) -> middleware('auth');
Route::post('/zwierzeta/update/{id}', [ZwierzetaKontroler::class, 'update']) -> middleware('auth');
Route::get('/zwierzeta/add', [ZwierzetaKontroler::class, 'create']) -> middleware('auth');
Route::post('/zwierzeta/save', [ZwierzetaKontroler::class, 'save']) -> middleware('auth');
Route::get('/zwierzeta/show/{id}', [ZwierzetaKontroler::class, 'show']) -> middleware('auth');
Route::post('/zwierzeta/delete/{id}', [ZwierzetaKontroler::class, 'destroy']) -> middleware('auth');

//Wolontariusze
Route::get('/wolontariusze/list', [WolontariuszeKontroler::class, 'allWolontariusze']) -> middleware('auth');
Route::get('/wolontariusze/edit/{id}', [WolontariuszeKontroler::class, 'edit']) -> middleware('auth');
Route::post('/wolontariusze/update/{id}', [WolontariuszeKontroler::class, 'update']) -> middleware('auth');
Route::get('/wolontariusze/form', [WolontariuszeKontroler::class, 'form']);
Route::post('/wolontariusze/save', [WolontariuszeKontroler::class, 'save']);
Route::get('/wolontariusze/thanks', [WolontariuszeKontroler::class, 'thanks']);
Route::get('/wolontariusze/show/{id}', [WolontariuszeKontroler::class, 'show']) -> middleware('auth');
Route::post('/wolontariusze/delete/{id}', [WolontariuszeKontroler::class, 'destroy']) -> middleware('auth');

//Tymczas
Route::get('/tymczas/list_current', [TymczasKontroler::class, 'allTymczasCurrent']) -> middleware('auth');
Route::get('/tymczas/list_archive', [TymczasKontroler::class, 'allTymczasArchive']) -> middleware('auth');
Route::get('/tymczas/add', [TymczasKontroler::class, 'create']) -> middleware('auth');
Route::post('/tymczas/save', [TymczasKontroler::class, 'save']) -> middleware('auth');
Route::get('/tymczas/edit/{id}', [TymczasKontroler::class, 'edit']) -> middleware('auth');
Route::post('/tymczas/update/{id}', [TymczasKontroler::class, 'update']) -> middleware('auth');
Route::get('/tymczas/show/{id}', [TymczasKontroler::class, 'show']) -> middleware('auth');
Route::post('/tymczas/delete/{id}', [TymczasKontroler::class, 'destroy']) -> middleware('auth');

//Adopcje
Route::get('/adopcje/list', [AdopcjeKontroler::class, 'allAdopcje']) -> middleware('auth');
Route::get('/adopcje/add', [AdopcjeKontroler::class, 'create']) -> middleware('auth');
Route::post('/adopcje/save', [AdopcjeKontroler::class, 'save']) -> middleware('auth');
Route::get('/adopcje/edit/{id}', [AdopcjeKontroler::class, 'edit']) -> middleware('auth');
Route::post('/adopcje/update/{id}', [AdopcjeKontroler::class, 'update']) -> middleware('auth');
Route::get('/adopcje/show/{id}', [AdopcjeKontroler::class, 'show']) -> middleware('auth');
Route::post('/adopcje/delete/{id}', [AdopcjeKontroler::class, 'destroy']) -> middleware('auth');

//Klienci
Route::get('/klienci/list', [KlienciKontroler::class, 'allKlienci']) -> middleware('auth');
Route::get('/klienci/edit/{id}', [KlienciKontroler::class, 'edit']) -> middleware('auth');
Route::post('/klienci/update/{id}', [KlienciKontroler::class, 'update']) -> middleware('auth');
Route::get('/klienci/add', [KlienciKontroler::class, 'create']);
Route::post('/klienci/save', [KlienciKontroler::class, 'save']);
Route::get('/klienci/show/{id}', [KlienciKontroler::class, 'show']) -> middleware('auth');
Route::post('/klienci/delete/{id}', [KlienciKontroler::class, 'destroy']) -> middleware('auth');




