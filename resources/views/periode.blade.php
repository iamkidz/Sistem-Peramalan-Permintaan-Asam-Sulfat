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
                    <h3>Periode</h3>
                </div>
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary d-inline float-right" data-toggle="modal"
                        data-target="#tambahModal">
                        Tambah Periode
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
                            <tr>
                                <th>Nama Periode</th>
                                <th style="width: 25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periode as $item)
                                <tr>
                                    <td>{{ tgl_indo($item->nama_periode) }}</td>
                                    <td>
                                        <button class="btn btn-warning"
                                            onclick="fungsiEdit(`{{ $item }}`)">Edit</button>
                                        <form action="{{ route('periode.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-delete">Hapus</button>
                                        </form>
                                    </td>
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
                    <h5 class="modal-title" id="tambahModalLabel">Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('periode.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nama Periode</label>
                            <input type="text" class="form-control datepicker" name="nama_periode"
                                placeholder="Nama Periode">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahModalLabel">Periode</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('periode.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Periode</label>
                            <input type="text" class="form-control datepicker" name="nama_periode"
                                placeholder="Nama Periode">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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

        function fungsiEdit(data) {
            var data = JSON.parse(data);
            var tanggal = data.nama_periode.split('-');
            $('#ubahModal').modal('show');
            $('#ubahModal form').attr('action', '{{ url('periode') }}/' + data.id);
            $('#ubahModal form input[name=nama_periode]').val(tanggal[1] + '-' + tanggal[0]);
            $(".datepicker").datepicker("update", tanggal[1] + '-' + tanggal[0]);
        }
    </script>
@endsection
