@extends('layouts.app')

@php
function tgl_indo($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
@endphp

@section('content')
    <div class="row">
        <div class="col">
            <div class="card" style="height:80vh !important">
                <div class="card-body" style="display: flex;align-items: center;justify-content: center;">
                    <div class="text-center my-auto">
                        <img src="{{ asset('img/logo.png') }}" width="50%" class="mb-4" />
                        <h2 class="h4 text-gray-900">Selamat Datang di<br></h2>
                        <h2 class="h4 text-gray-900">Sistem Peramalan Permintaan Asam Sulfat<br></h2>
                        <h2 class="h4 text-gray-900 mb-5">PT. Petrokimia Gresik</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
