<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function index()
    {
        $permintaan = Permintaan::all();
        return view('laporan', compact('permintaan'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
        ]);

        $periode_awal = date('Y-m-d', strtotime('01-' . $request->periode_awal));
        $periode_akhir = date('Y-m-d', strtotime('01-' . $request->periode_akhir));

        $permintaan = Permintaan::whereHas('periode', function ($query) use ($periode_awal, $periode_akhir) {
            return $query->whereBetween('nama_periode', [$periode_awal, $periode_akhir]);
        })->get();

        if (count($permintaan) > 0) {
            $pdf = PDF::loadview('template_laporan', compact('permintaan'));
            return $pdf->download('Laporan.pdf');
        } else {
            Alert::error('Gagal', 'Data yang dicetak kosong');
            return back();
        }

    }
}
