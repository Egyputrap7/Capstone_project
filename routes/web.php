<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardDomController;
use App\Http\Controllers\DashboardUsaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\FeedbackAdmin;
use App\Http\Controllers\ktpBaruController;
use App\Http\Controllers\ktpRusakController;
use App\Http\Controllers\visiController;
use App\Http\Controllers\sejarahController;
use App\Http\Controllers\strukturController;
use App\Http\Controllers\alurController;
use App\Http\Controllers\syaratController;

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

Route::get('/', [HomeController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->middleware('guest');
    Route::post('/register', 'store');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/dashboard/cetak_pdf', [DashboardController::class, 'cetak_pdf'])->middleware('auth');

Route::get('/dashboard/domisili/{domisili:noSurat}/cetak', [DashboardDomController::class, 'cetak'])->middleware('auth');
Route::get('/dashboard/usaha/{usaha:noSurat}/cetak', [DashboardUsaController::class, 'cetak'])->middleware('auth');
Route::resource('/dashboard/domisili', DashboardDomController::class)->middleware('auth');
Route::resource('/dashboard/usaha', DashboardUsaController::class)->middleware('auth');

//profilCOntroller
Route::resource('/dashboard/profil', ProfilController::class)->middleware('auth');
Route::put('profil/{profil}/takedown', [ProfilController::class, 'takedown'])->name('profil.takedown');
Route::put('profil/{profil}/publish', [ProfilController::class, 'publish'])->name('profil.publish');



Route::resource('/dashboard/syarat', PersyaratanController::class)->middleware('auth');
Route::put('dashboard/{syarat}/takedown', [PersyaratanController::class, 'takedown'])->name('syarat.takedown');
Route::put('dashboard/{syarat}/publish', [PersyaratanController::class, 'publish'])->name('syarat.publish');

Route::resource('/dashboard/Feedback', FeedbackAdmin::class)->middleware('auth');

// Route::post('/dashboard/profilDesa/store', [ProfilController::class, 'store'])->name('profilDesa.store.post');



//route di tampilan landing Page
Route::resource('/main/feedback', feedbackController::class)->middleware('guest');
Route::resource('/main/newKtp', ktpBaruController::class)->middleware('guest');
Route::resource('/main/ktpRusak', ktpRusakController::class)->middleware('guest');
Route::resource('/profilDesa/visi', visiController::class)->middleware('guest');
Route::resource('/profilDesa/sejarah', sejarahController::class)->middleware('guest');
Route::resource('/profilDesa/struktur', strukturController::class)->middleware('guest');
Route::resource('/main/layanan/alur', alurController::class)->middleware('guest');
Route::resource('/main/layanan/persyaratan', syaratController::class)->middleware('guest');



// Route::get('/dashboard/domisili/cetak_pdf', [DashboardDomController::class, 'cetak_pdf'])->middleware('auth');
