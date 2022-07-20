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
                    <h3>Permintaan</h3>
                </div>
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary d-inline float-right" data-toggle="modal"
                        data-target="#tambahModal">
                        Tambah Permintaan
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
                                <th></th>
                            </tr>
                            <tr>
                                <th rowspan="2">Bulan</th>
                                <th colspan="4" class="text-center">Jumlah</th>
                                <th rowspan="2" style="width: 25%">Aksi</th>
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
                                    <td>
                                        <button class="btn btn-warning"
                                            onclick="fungsiEdit(`{{ $item }}`)">Edit</button>
                                        <form action="{{ route('permintaan.destroy', $item->id) }}" method="POST"
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
                    <h5 class="modal-title" id="tambahModalLabel">Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('permintaan.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="id_periode" class="form-control">
                                <option value="">Pilih Bulan</option>
                                @foreach ($periode as $item)
                                    <option value="{{ $item->id }}">{{ tgl_indo($item->nama_periode) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Produksi</label>
                            <input type="number" class="form-control" name="jumlah_produksi">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Impor</label>
                            <input type="number" class="form-control" name="jumlah_impor">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Permintaan</label>
                            <input type="number" class="form-control" name="jumlah_permintaan">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Sisa</label>
                            <input type="number" class="form-control" name="jumlah_sisa">
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
                    <h5 class="modal-title" id="ubahModalLabel">Permintaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('permintaan.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Bulan</label>
                            <select name="id_periode" class="form-control">
                                <option value="">Pilih Bulan</option>
                                @foreach ($periode as $item)
                                    <option value="{{ $item->id }}">{{ tgl_indo($item->nama_periode) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Produksi</label>
                            <input type="number" class="form-control" name="jumlah_produksi">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Impor</label>
                            <input type="number" class="form-control" name="jumlah_impor">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Permintaan</label>
                            <input type="number" class="form-control" name="jumlah_permintaan">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Sisa</label>
                            <input type="number" class="form-control" name="jumlah_sisa">
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

            $('#ubahModal').modal('show');
            $('#ubahModal form').attr('action', '{{ url('permintaan') }}/' + data.id);
            $('#ubahModal form select[name=id_periode]').val(data.id_periode);
            $('#ubahModal form input[name=jumlah_produksi]').val(data.jumlah_produksi);
            $('#ubahModal form input[name=jumlah_impor]').val(data.jumlah_impor);
            $('#ubahModal form input[name=jumlah_permintaan]').val(data.jumlah_permintaan);
            $('#ubahModal form input[name=jumlah_sisa]').val(data.jumlah_sisa);
        }
    </script>
@endsection
