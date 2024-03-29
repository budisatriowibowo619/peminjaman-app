<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PeminjamanKendaraanController;
use App\Http\Controllers\RuangrapatController;
use App\Http\Controllers\PeminjamanRuangrapatController;
use App\Http\Controllers\LoginController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/processLogin', [LoginController::class, 'ajax_process_login']);

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
    Route::get('/gtMasterRuangRapat', [RuangrapatController::class, 'ajax_gt_master_ruangrapat']); // Get Data Master Ruang Rapat
    Route::post('/processMasterRuangRapat', [RuangrapatController::class, 'ajax_pcs_master_ruangrapat']); // Proses Master Kendaraan
    Route::get('/deleteMasterRuangRapat', [RuangrapatController::class, 'ajax_del_master_ruangrapat']); // Proses Master Kendaraan

# End Ajax Master #

# Ajax Peminjaman #

    # Kendaraan
    Route::get('/calendarKendaraan', [PeminjamanKendaraanController::class, 'calendar_kendaraan']); // Kalender Kendaraan
    Route::get('/gtCalendarPeminjamanKendaraan', [PeminjamanKendaraanController::class, 'ajax_gt_calendar_kendaraan']); // Calendar Peminjaman
    Route::get('/gtPeminjamanKendaraan', [PeminjamanKendaraanController::class, 'ajax_gt_peminjaman_kendaraan']); // Ambil Data Peminjaman Preview
    Route::post('/processPinjamKendaraan', [PeminjamanKendaraanController::class, 'ajax_pcs_form_kendaraan']); // Proses Peminjaman Kendaraan
    Route::post('/processPindahPeminjaman', [PeminjamanKendaraanController::class, 'ajax_process_pindah_kendaraan']);

    Route::get('/rekapitulasiKendaraan', [PeminjamanKendaraanController::class, 'rekapitulasi_kendaraan']); // Rekapitulasi Kendaraan
    Route::get('/DTRekapitulasiKendaraan', [PeminjamanKendaraanController::class, 'ajax_dt_rekapitulasi_kendaraan']); // Tabel Rekapitulasi Kendaraan
    Route::get('/cancelPeminjamanKendaraan', [PeminjamanKendaraanController::class, 'ajax_cancel_form_kendaraan']); // Proses Cancel Peminjaman
    # #########

    # Ruang Rapat
    Route::get('/calendarRuangrapat', [PeminjamanRuangrapatController::class, 'calendar_ruangrapat']); // Kalender Ruang Rapat
    Route::get('/gtCalendarPeminjamanRuangrapat', [PeminjamanRuangrapatController::class, 'ajax_gt_calendar_ruangrapat']); // Calendar Ruang Rapat
    Route::get('/gtPeminjamanRuangrapat', [PeminjamanRuangrapatController::class, 'ajax_gt_peminjaman_ruangrapat']); // Ambil Data Peminjaman Preview
    Route::post('/processPinjamRuangrapat', [PeminjamanRuangrapatController::class, 'ajax_pcs_form_ruangrapat']); // Proses Peminjaman Kendaraan

    Route::get('/rekapitulasiRuangrapat', [PeminjamanRuangrapatController::class, 'rekapitulasi_ruangrapat']); // Rekapitulasi Ruang Rapat
    Route::get('/DTRekapitulasiRuangrapat', [PeminjamanRuangrapatController::class, 'ajax_dt_rekapitulasi_ruangrapat']); // Tabel Rekapitulasi Ruang Rapat
    Route::get('/cancelPeminjamanRuangrapat', [PeminjamanRuangrapatController::class, 'ajax_cancel_form_ruangrapat']); // Proses Cancel Peminjaman
    # ###########
    
# End Ajax Peminjaman #

# Ajax Select #
Route::get('/selectKendaraan', [KendaraanController::class, 'ajax_select_kendaraan']);
Route::get('/selectRuangRapat', [RuangrapatController::class, 'ajax_select_ruangrapat']);
# End Ajax Select #