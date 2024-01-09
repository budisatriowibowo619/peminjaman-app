<?php

namespace App\Http\Controllers;
use App\Models\Rekapitulasi;
use DataTables;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    
    public function rekapitulasi_kendaraan()
    {
        return view('rekapitulasi/kendaraan', [
            'page'      => 'Rekapitulasi Peminjaman Kendaraan',
            'js_script' => 'js/rekapitulasi/kendaraan.js'
        ]);
    }

    public function ajax_dt_rekapitulasi_kendaraan(Request $request)
    {
        if ($request->ajax()) {
            $gt_tb_peminjaman_kendaraan = Rekapitulasi::gt_tb_peminjaman_kendaraan();

            $DT_rekapitulasi_kendaraan = Datatables::of($gt_tb_peminjaman_kendaraan)
                                    ->addIndexColumn()
                                    // ->addColumn('status_pinjaman', function($row){
                                    //     $status_pinjaman = '';
                                    //     if($row->status === 1){
                                    //         $status_pinjaman = '<span class="badge rounded-pill bg-outline-info">Bisa Dipinjam</span>';
                                    //     } else if ($row->status ===5){
                                    //         $status_pinjaman = '<span class="badge rounded-pill bg-outline-danger">Tidak bisa dipinjam</span>';
                                    //     }
                                    //     return $status_pinjaman;
                                    // })
                                    ->addColumn('action', function($row){
                                        if($row->status == 1) {
                                            $button  =  '<a href="#" onClick="pembatalanPeminjaman('.$row->id.')" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal"><em class="icon ni ni-cross"></em></a>';
                                            return $button;
                                        } else if ($row->status == 5){
                                            return '<span class="badge rounded-pill bg-outline-danger">Dibatalkan</span>';
                                        }
                                    })->rawColumns(['action','status_pinjaman'])->make(true);

            return $DT_rekapitulasi_kendaraan;
        }
    }

}
