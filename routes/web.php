<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\IdentitasController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KonselingController as AdminKonselingController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\TestimoniController as AdminTestimoniController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Dokter\LoginController as DokterLoginController;
use App\Http\Controllers\Dokter\SesiOnlineController as DokterSesiOnlineController;
use App\Http\Controllers\Pasien\HomeController as PasienHomeController;
use App\Http\Controllers\Pasien\JadwalController as PasienJadwalController;
use App\Http\Controllers\Pasien\KonselingController as PasienKonselingController;
use App\Http\Controllers\Pasien\PasienController;
use App\Http\Controllers\Pasien\SesiOnlineController as PasienSesiOnlineController;
use App\Http\Controllers\Pasien\TestimoniController as PasienTestimoniController;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\PostGuzzleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [PageController::class, 'index']);

Route::get('posts', [PostController::class, 'index']);


Route::get('/welcome', function(){
    return view('welcome');
});

Route::get('/autocomplete', [GejalaController::class, 'index2']);

Route::post('/autocomplete/getAutocomplete/', [GejalaController::class, 'getAutocomplete'])->name('Autocomplte.getAutocomplte');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('fullcalender', [PasienHomeController::class, 'index2']);
Route::post('fullcalenderAjax', [PasienHomeController::class, 'ajax']);

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
        Route::post('/profil/update-password', [AdminController::class, 'updatepassword'])->name('admin.profil.password');
        Route::get('/jadwal-konseling', [AdminController::class, 'getkonseling']);

        Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('admin.testimoni');

        Route::get('/data-dokter', [AdminDokterController::class, 'index'])->name('admin.dokter');
        Route::post('/data-dokter/create', [AdminDokterController::class, 'create'])->name('admin.dokter.create');
        Route::post('/data-dokter/update/{id}', [AdminDokterController::class, 'update'])->name('admin.dokter.update');
        Route::get('/data-dokter/delete/{id}', [AdminDokterController::class, 'delete']);

        Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
        Route::post('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
        Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);
        Route::post('/kategori/import', [KategoriController::class, 'import'])->name('admin.kategori.import');

        Route::get('/gejala', [GejalaController::class, 'index'])->name('admin.gejala');
        Route::post('/gejala/create', [GejalaController::class, 'create'])->name('admin.gejala.create');
        Route::post('/gejala/update/{id}', [GejalaController::class, 'update'])->name('admin.gejala.update');
        Route::get('/gejala/delete/{id}', [GejalaController::class, 'delete']);
        Route::get('/gejala/cari', [GejalaController::class, 'cari']);
        Route::post('/gejala/import', [GejalaController::class, 'import'])->name('admin.gejala.import');

        Route::get('/konseling', [AdminKonselingController::class, 'index'])->name('admin.konseling');
        Route::get('/konseling/konfirmasi/{id}', [AdminKonselingController::class, 'konfirmasi']);
        Route::get('/konseling/notifikasi-pesan', [AdminKonselingController::class, 'notifikasi']);
        Route::get('/konseling/notifikasi-jumlah', [AdminKonselingController::class, 'jumlahnotif']);

        Route::get('/jadwal', [AdminJadwalController::class, 'index'])->name('admin.jadwal');
        Route::post('/jadwal/create', [AdminJadwalController::class, 'create'])->name('admin.jadwal.create');
        Route::post('/jadwal/update/{id}', [AdminJadwalController::class, 'update'])->name('admin.jadwal.update');
        Route::get('/jadwal/delete/{id}', [AdminJadwalController::class, 'delete']);

        Route::get('/identitas', [IdentitasController::class, 'index'])->name('admin.identitas');
        Route::post('/identitas/create', [IdentitasController::class, 'create'])->name('admin.identitas.create');
        Route::post('/identitas/update/{id}', [IdentitasController::class, 'update'])->name('admin.identitas.update');
        Route::get('/identitas/delete/{id}', [IdentitasController::class, 'delete']);

        Route::get('posts', [PostController::class, 'index']);

    });
});

Route::prefix('dokter')->group(function () {
    Route::get('/login', [DokterLoginController::class, 'showLoginForm'])->name('dokter.login');
    Route::post('/login', [DokterLoginController::class, 'login'])->name('dokter.login.post');
    Route::post('/logout', [DokterLoginController::class, 'logout'])->name('dokter.logout');

    Route::group(['middleware' => ['auth:dokter']], function () {
        Route::get('/', [DokterController::class, 'index'])->name('dokter.dashboard');
        Route::get('/jadwal-konseling', [DokterController::class, 'getkonseling']);
        Route::get('/profil', [DokterController::class, 'profil'])->name('dokter.profil');
        Route::post('/profil/update', [DokterController::class, 'update'])->name('dokter.profil.update');
        Route::post('/profil/update-password', [DokterController::class, 'updatepassword'])->name('dokter.profil.password');

        Route::get('/sesi-online', [DokterSesiOnlineController::class, 'index'])->name('dokter.sesi');
        Route::get('/sesi-online/chat/{id}', [DokterSesiOnlineController::class, 'sesi_online'])->name('dokter.sesi.chat');
        Route::post('/sesi-online/create', [DokterSesiOnlineController::class, 'create'])->name('dokter.sesi.create');
        Route::get('/sesi-online/message/{id}', [DokterSesiOnlineController::class, 'message']);
    });
});

Route::prefix('pasien')->group(function () {
    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get('/', [PasienController::class, 'index'])->name('pasien.dashboard');
        Route::get('/profil', [PasienController::class, 'profil'])->name('pasien.profil');
        Route::post('/profil/update', [PasienController::class, 'update'])->name('pasien.profil.update');

        Route::get('/konseling', [PasienKonselingController::class, 'index'])->name('pasien.konseling');
        Route::post('/konseling/create', [PasienKonselingController::class, 'create'])->name('pasien.konseling.create');
        Route::post('/konseling/bukti-bayar/{id}', [PasienKonselingController::class, 'buktibayar'])->name('pasien.konseling.bayar');
        Route::post('/konseling/jadwal-ulang/{id}', [PasienKonselingController::class, 'jadwalulang'])->name('pasien.konseling.jadwal');
        Route::post('/konseling/jadwal-setuju/{id}', [PasienKonselingController::class, 'jadwalsetuju'])->name('pasien.konseling.jadwal-setuju');

        Route::get('/jadwal', [PasienJadwalController::class, 'index'])->name('pasien.jadwal');
        Route::post('/jadwal/update/{id}', [PasienJadwalController::class, 'update'])->name('pasien.jadwal.update');

        Route::get('/testimoni', [PasienTestimoniController::class, 'index'])->name('pasien.testimoni');
        Route::post('/testimoni/create', [PasienTestimoniController::class, 'create'])->name('pasien.testimoni.create');
        Route::post('/testimoni/update/{id}', [PasienTestimoniController::class, 'update'])->name('pasien.testimoni.update');
        Route::get('/testimoni/delete/{id}', [PasienTestimoniController::class, 'delete']);

        Route::get('/sesi-online', [PasienSesiOnlineController::class, 'index'])->name('pasien.sesi');
        Route::get('/sesi-online/chat/{id}', [PasienSesiOnlineController::class, 'sesi_online'])->name('pasien.sesi.chat');
        Route::post('/sesi-online/create', [PasienSesiOnlineController::class, 'create'])->name('pasien.sesi.create');
        Route::get('/sesi-online/message/{id}', [PasienSesiOnlineController::class, 'message']);
        Route::get('/sesi-online/notifikasi', [PasienSesiOnlineController::class, 'notifikasi']);

    });
});

Route::prefix('email')->group(function () {
    Route::get('/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect(route('pasien.dashboard'));
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Link verifikasi email dikirim!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

