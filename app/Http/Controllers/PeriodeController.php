<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodeController extends Controller
{
    public function index()
    {
        $periode = Periode::orderBy('id', 'desc')->get();
        return view('periode', compact('periode'));
    }

    public function store(Request $request)
    {
        $periode = new Periode;
        $periode->nama_periode = date('Y-m-d', strtotime('01-' . $request->nama_periode));
        $periode->save();

        Alert::success('Berhasil', 'Periode berhasil ditambahkan');
        return back();
    }

    public function show($id)
    {
        $periode = Periode::find($id);
        return response()->json($periode);
    }

    public function update(Request $request, $id)
    {
        $periode = Periode::find($id);
        $periode->nama_periode = date('Y-m-d', strtotime('01-' . $request->nama_periode));
        $periode->save();

        Alert::success('Berhasil', 'Periode berhasil diubah');
        return back();
    }

    public function destroy($id)
    {
        $periode = Periode::find($id);
        $periode->delete();

        Alert::success('Berhasil', 'Periode berhasil dihapus');
        return back();
    }
}
