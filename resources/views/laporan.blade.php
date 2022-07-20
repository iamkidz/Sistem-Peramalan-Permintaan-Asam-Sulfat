@extends('layouts.app')

@section('content')
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
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <h3>Laporan</h3>
                </div>
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary d-inline float-right" data-toggle="modal"
                        data-target="#tambahModal">
                        Cetak Laporan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-stripped table-bordered w-100">
                        <thead>
                            <tr class="d-none">
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th rowspan="2">Periode</th>
                                <th colspan="4" class="text-center">Jumlah</th>
                            </tr>
                            <tr>
                                <th>Produksi</th>
                                <th>Impor</th>
                                <th>Permintaan</th>
                                <th>Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permintaan as $item)
                                <tr>
                                    <td>{{ tgl_indo($item->periode->nama_periode) }}</td>
                                    <td>{{ $item->jumlah_produksi }}</td>
                                    <td>{{ $item->jumlah_impor }}</td>
                                    <td>{{ $item->jumlah_permintaan }}</td>
                                    <td>{{ $item->jumlah_sisa }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Cetak Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('laporan.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label>Periode Awal</label>
                            <input type="text" class="form-control datepicker" name="periode_awal">
                        </div>
                        <div class="form-group">
                            <label>Peride Akhir</label>
                            <input type="text" class="form-control datepicker" name="periode_akhir">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                },
                order: false
            });

            $('.datepicker').datepicker({
                format: "mm-yyyy",
                startView: "months",
                minViewMode: "months"
            });
        });
    </script>
@endsection
