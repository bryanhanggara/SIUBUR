<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuruhController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\ReportAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LandingController;
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



Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/dashboard-buruh', [BuruhController::class,'index'])->middleware('auth')->name('home.user');

Route::get('profile/{username}', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile-update', [ProfileController::class,'updateProfile'])->name('profile.update');
Route::put('/profile-update-jabatan', [ProfileController::class,'jabatan'])->name('profile.jabatan');

Route::get('report-user', [ReportController::class, 'index'])->name('report');

Route::get('absen-buruh', [AbsensiController::class, 'index'])->name('absen.index');
// Rute untuk absensi masuk
Route::post('/absensi/masuk', [AbsensiController::class, 'absensiMasuk']);

// Rute untuk absensi pulang
Route::post('/absensi/pulang', [AbsensiController::class, 'absensiPulang']);

Route::get('/report/download/{id}', [ReportController::class, 'download'])->name('report.download');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware('auth','isAdmin');
    Route::resource('jabatan', JabatanController::class);
    Route::get('/data-buruh', [DataController::class, 'index'])->name('data.index');
    Route::get('/data-buruh/operator', [DataController::class, 'operator'])->name('data.operator');
    Route::get('/data-buruh/kasar', [DataController::class, 'buruhKasar'])->name('data.buruh');
    Route::get('/data-buruh-edit/{id}', [DataController::class, 'edit'])->name('data.edit');
    Route::put('/data-buruh-selesai/{id}', [DataController::class, 'update'])->name('data.update');
    Route::resource('performance', ReportAdminController::class);
});


Auth::routes(['verify'=> true]);
