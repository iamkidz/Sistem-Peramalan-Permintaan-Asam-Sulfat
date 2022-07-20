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
                    <h3>User</h3>
                </div>
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary d-inline float-right" data-toggle="modal"
                        data-target="#tambahModal">
                        Tambah User
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>No HP</th>
                                <th>Jabatan</th>
                                <th style="width: 25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->jabatan == 'manager' ? 'Manager Produksi' : 'Kepala Produksi' }}</td>
                                    <td>
                                        <button class="btn btn-warning mb-3 btn-sm"
                                            onclick="fungsiEdit(`{{ $item }}`)">Edit</button>
                                        <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-delete mb-3 btn-sm">Hapus</button>
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
                    <h5 class="modal-title" id="tambahModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select type="text" class="form-control" name="jabatan">
                                <option value="manager">Manager Produksi</option>
                                <option value="kepala">Kepala Produksi</option>
                            </select>
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
                    <h5 class="modal-title" id="ubahModalLabel">Ubah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Kosongkan jika tidak ingin diubah">
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select type="text" class="form-control" name="jabatan">
                                <option value="manager">Manager Produksi</option>
                                <option value="kepala">Kepala Produksi</option>
                            </select>
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
            $('#user_id').val(data.id);
            $('#ubahModal form').attr('action', '{{ url('user') }}/' + data.id);
            $('#ubahModal form input[name=nama]').val(data.nama);
            $('#ubahModal form input[name=email]').val(data.email);
            $('#ubahModal form input[name=username]').val(data.username);
            $('#ubahModal form input[name=no_hp]').val(data.no_hp);
            $('#ubahModal form select[name=jabatan]').val(data.jabatan);
        }
    </script>
@endsection
