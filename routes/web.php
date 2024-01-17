<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PeminjamanKendaraanController;
use App\Http\Controllers\RuangrapatController;

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

Route::get('/', [DashboardController::class, 'index']);

# Halaman #
Route::get('/index', [DashboardController::class, 'index']);

# End Halaman #

# Ajax Master #

    # Kendaraan
    Route::get('/masterKendaraan', [KendaraanController::class, 'page_master_kendaraan']);

    Route::get('/DTMasterKendaraan', [KendaraanController::class, 'ajax_dt_master_kendaraan']); // Tabel Master Kendaraan
    Route::get('/gtMasterKendaraan', [KendaraanController::class, 'ajax_gt_master_kendaraan']); // Get Data Master Kendaraan
    Route::post('/processMasterKendaraan', [KendaraanController::class, 'ajax_pcs_master_kendaraan']); // Proses Master Kendaraan
    Route::get('/deleteMasterKendaraan', [KendaraanController::class, 'ajax_del_master_kendaraan']); // Proses Hapus Master Kendaraan

    # RuangRapat
    Route::get('/masterRuangRapat', [RuangrapatController::class, 'page_master_ruangrapat']);

    Route::get('/DTMasterRuangRapat', [RuangrapatController::class, 'ajax_dt_master_ruangrapat']); // Table Master Ruang Rapat

# End Ajax Master #

# Ajax Peminjaman #

    # Kendaraan
    Route::get('/formKendaraan', [PeminjamanKendaraanController::class, 'form_kendaraan']); // Form Kendaraan
    Route::get('/rekapitulasiKendaraan', [PeminjamanKendaraanController::class, 'rekapitulasi_kendaraan']); // Rekapitulasi Kendaraan
    Route::get('/DTRekapitulasiKendaraan', [PeminjamanKendaraanController::class, 'ajax_dt_rekapitulasi_kendaraan']); // Tabel Rekapitulasi Kendaraan
    Route::post('/processPinjamKendaraan', [PeminjamanKendaraanController::class, 'ajax_pcs_form_kendaraan']); // Proses Peminjaman Kendaraan
    Route::get('/cancelPeminjamanKendaraan', [PeminjamanKendaraanController::class, 'ajax_cancel_form_kendaraan']); // Proses Cancel Peminjaman
    
# End Ajax Peminjaman #

# Ajax Select #
Route::get('/selectKendaraan', [KendaraanController::class, 'ajax_select_kendaraan']);
# End Ajax Select #