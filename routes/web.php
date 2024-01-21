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
use App\Http\Controllers\kkBaruController;
use App\Http\Controllers\visiController;
use App\Http\Controllers\sejarahController;
use App\Http\Controllers\strukturController;
use App\Http\Controllers\alurController;
use App\Http\Controllers\syaratController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KtpAdminController;
use App\Http\Controllers\KkAdminController;
use App\Http\Controllers\ArsipKtpController;
use App\Http\Controllers\ArsipKkController;
use App\Http\Controllers\showBeritaController;

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

//BeritaCOntroller
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
    Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::put('/berita/{berita}/takedown', [BeritaController::class, 'takedown'])->name('berita.takedown');
    Route::put('/berita/{berita}/publish', [BeritaController::class, 'publish'])->name('berita.publish');
});

//PermohonanKTPController
Route::resource('/dashboard/ktp', KtpAdminController::class)->middleware('auth');
Route::get('/dashboard/ktp/{ktp:id}/cetak', [KtpAdminController::class, 'cetak'])->middleware('auth');
Route::post('/dashboard/ktp/{ktp:id}/terima', [KtpAdminController::class, 'terima'])->name('ktp.terima');

//PermohonanKKController
Route::resource('/dashboard/kk', KkAdminController::class)->middleware('auth');
Route::get('/dashboard/kk/{kk:id}/cetak', [KkAdminController::class, 'cetak'])->middleware('auth');
Route::post('/dashboard/kk/{kk:id}/terima', [KkAdminController::class, 'terima'])->name('kk.terima');

//ArsipKTPController
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/arsipktp', [ArsipKtpController::class, 'index'])->name('arsipktp.index');
    Route::get('/arsipktp/create', [ArsipKtpController::class, 'create'])->name('arsipktp.create');
    Route::post('/arsipktp', [ArsipKtpController::class, 'store'])->name('arsipktp.store');
    Route::get('/arsipktp/{aktp}', [ArsipKtpController::class, 'show'])->name('arsipktp.show');
    Route::get('/arsipktp/{aktp}/edit', [ArsipKtpController::class, 'edit'])->name('arsipktp.edit');
    Route::put('/arsipktp/{aktp}', [ArsipKtpController::class, 'update'])->name('arsipktp.update');
    Route::delete('/arsipktp/{aktp}', [ArsipKtpController::class, 'destroy'])->name('arsipktp.destroy');
    Route::get('/arsipktp/{aktp}/cetak', [ArsipKtpController::class, 'cetak'])->name('arsipktp.cetak');
});

//ArsipKKController
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/arsipkk', [ArsipKkController::class, 'index'])->name('arsipkk.index');
    Route::get('/arsipkk/create', [ArsipKkController::class, 'create'])->name('arsipkk.create');
    Route::post('/arsipkk', [ArsipKkController::class, 'store'])->name('arsipkk.store');
    Route::get('/arsipkk/{akk}', [ArsipKkController::class, 'show'])->name('arsipkk.show');
    Route::get('/arsipkk/{akk}/edit', [ArsipKkController::class, 'edit'])->name('arsipkk.edit');
    Route::put('/arsipkk/{akk}', [ArsipKkController::class, 'update'])->name('arsipkk.update');
    Route::delete('/arsipkk/{akk}', [ArsipKkController::class, 'destroy'])->name('arsipkk.destroy');
    Route::get('/arsipkk/{akk}/cetak', [ArsipKkController::class, 'cetak'])->name('arsipkk.cetak');
});


Route::resource('/dashboard/syarat', PersyaratanController::class)->middleware('auth');
Route::put('dashboard/{syarat}/takedown', [PersyaratanController::class, 'takedown'])->name('syarat.takedown');
Route::put('dashboard/{syarat}/publish', [PersyaratanController::class, 'publish'])->name('syarat.publish');

Route::resource('/dashboard/Feedback', FeedbackAdmin::class)->middleware('auth');

// Route::post('/dashboard/profilDesa/store', [ProfilController::class, 'store'])->name('profilDesa.store.post');



//route di tampilan landing Page
Route::resource('/main/feedback', feedbackController::class)->middleware('guest');
Route::resource('/main/newKk', kkBaruController::class)->middleware('guest');
Route::resource('/main/newKtp', ktpBaruController::class)->middleware('guest');
Route::resource('/profilDesa/visi', visiController::class)->middleware('guest');
Route::resource('/profilDesa/sejarah', sejarahController::class)->middleware('guest');
Route::resource('/profilDesa/struktur', strukturController::class)->middleware('guest');
Route::resource('/main/layanan/alur', alurController::class)->middleware('guest');
Route::resource('/main/layanan/persyaratan', syaratController::class)->middleware('guest');

//showberita
Route::resource('/main/detailBerita', HomeController::class);



// Route::get('/dashboard/domisili/cetak_pdf', [DashboardDomController::class, 'cetak_pdf'])->middleware('auth');
