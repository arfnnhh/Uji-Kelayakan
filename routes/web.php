<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
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

Route::get('/',[AuthController::class, 'index'])->name('login');
Route::post('/postlogin',[AuthController::class, 'postlogin'])->name( 'postlogin');
Route::get('/restricted',[AuthController::class, 'restricted'])->name('restrict');
Route::get('/signout',[AuthController::class, 'signout'])->name('logout');


Route::prefix('/staff')->name('staff.')->middleware(['auth', 'Staff'])->group( function () {
    Route::get('/dashboard', [KlasifikasiController::class, 'index'])->name('stfHome');
    Route::prefix('/surat')->name('surat.')->group( function () {
        Route::get('/data', [SuratController::class, 'index'])->name('data');
        Route::get('/tambah', [SuratController::class, 'tambahSurat'])->name('tambah');
        Route::post('/suratSave', [SuratController::class, 'tambahSuratSave'])->name('suratSave');
        Route::get('/exportExcel', [SuratController::class, 'exportSuratExc'])->name('exportSurat');

        Route::prefix('/klasifikasi')->name('klasifikasi.')->group( function () {
            Route::get('/data', [KlasifikasiController::class, 'dataKls'])->name('data');
            Route::get('/tambah', [KlasifikasiController::class, 'tambahKls'])->name('tambah');
            Route::post('/saveAdd', [KlasifikasiController::class, 'saveKls'])->name('saveKls');
            Route::get('/edit/{id}', [KlasifikasiController::class, 'updateKls'])->name('updateKls');
            Route::put('/{id}', [KlasifikasiController::class, 'updateKlsSave'])->name('updateKlsSave');
            Route::delete('/{id}', [KlasifikasiController::class, 'deleteKls'])->name('deleteKls');
            Route::get('/exportData', [KlasifikasiController::class, 'exportKls'])->name('exportKls');
            Route::get('/view/{id}', [KlasifikasiController::class, 'viewKls'])->name('view');
            Route::get('/view/pdf/{id}', [KlasifikasiController::class, 'view_pdf'])->name('viewpdf');
        });
    });
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/data', [UserController::class, 'index'])->name('index');
        Route::get('/addUser', [UserController::class,'add'])->name('add');
        Route::post('/add', [UserController::class, 'signupsave'])->name('addSave');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [UserController::class, 'update'])->name('editSave');
        Route::get('/export', [UserController::class, 'export'])->name('export');
    });
});

Route::prefix('/teacher')->name('teacher.')->middleware(['auth', 'Teacher'])->group( function () {
    Route::get('/dashboard', [KlasifikasiController::class, 'tchIndex'])->name('tchHome');
    Route::prefix('/surat')->name('surat.')->group( function () {
        Route::get('/data', [SuratController::class, 'tchSuratData'])->name('data');
        Route::get('/export/excel', [SuratController::class, 'exportExcelTch'])->name('exportExcelTch');

        Route::prefix('/hasil')->name('hasil.')->group( function () {
            Route::get('/view/{id}', [SuratController::class, 'addHasil'])->name('view');
            Route::post('/view/save/{id}', [SuratController::class, 'hasilSuratSave'])->name('viewSave');
            Route::get('/view/added/{id}', [SuratController::class, 'hasilSuratView'])->name('viewHasil');
        });
    });
});

