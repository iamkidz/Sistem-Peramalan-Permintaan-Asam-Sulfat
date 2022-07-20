@extends('layouts.app')
@section('peramalan')
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
    <div class="row mb-2 mt-4">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <h3>Prediksi</h3>
                </div>
                @if (auth()->user()->jabatan == 'manager')
                    <div class="col mb-3">
                        <button type="button" class="btn btn-primary d-inline float-right" data-toggle="modal"
                            data-target="#tambahModal">
                            Hitung Ulang Prediksi
                        </button>
                        <a href="{{ url('hapus-peramalan') }}" class="btn btn-info d-inline float-right mr-2">
                            Kosongkan Hasil Peramalan
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if (count($peramalan) > 0)
        <div class="row mb-3">
            <div class="col mb-3">
                <div class="card">
                    <div class="card-header text-center">
                        <h6 class="card-title">Prediksi Permintaan Bulan Depan</h6>
                    </div>
                    <div class="card-body text-center">
                        <span class="font-weight-bold">
                            {{ number_format($peramalan[count($peramalan) - 1]->bulan_depan, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="card-footer text-center">
                        {{-- text miring --}}
                        <span class="text-muted">
                            <i>Hasil peramalan diatas, adalah hasil peramalan permintaan untuk bulan depan yang bisa
                                dijadikan
                                acuan dalam pengambilan keputusan dalam menentukan jumlah produksi.</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" width="auto" height="150%"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-stripped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Data Aktual</th>
                                <th>Hasil Prediksi</th>
                                <th>Error</th>
                                <th>MAD</th>
                                <th>MSE</th>
                                <th>MAPE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($peramalan as $item)
                                <tr>
                                    <td>{{ tgl_indo($item->periode->nama_periode) }}</td>
                                    <td class="permintaan">{{ $item->permintaan }}</td>
                                    <td class="peramalan">{{ $item->peramalan }}</td>
                                    <td class="error">{{ $item->error }}</td>
                                    <td class="mad">{{ $item->mad }}</td>
                                    <td class="mse">{{ $item->mse }}</td>
                                    <td>{{ !is_null($item->mape) ? $item->mape . '%' : '' }}</td>
                                    <td class="mape d-none">{{ $item->mape }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data belum dihitung</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td colspan="3">Total</td>
                                <td id="error"></td>
                                <td id="mad"></td>
                                <td id="mse"></td>
                                <td id="mape"></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td colspan="3">Rata - Rata</td>
                                <td id="ave_error"></td>
                                <td id="ave_mad"></td>
                                <td id="ave_mse"></td>
                                <td id="ave_mape"></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td colspan="5" class="text-center">
                                    Standar Error
                                </td>
                                <td colspan="2" id="standar_error" class="text-center"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Hitung Peramalan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('peramalan.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Metode</label>
                            <select type="text" class="form-control" name="metode">
                                <option value="">Pilih Metode</option>
                                <option value="1">Simple Moving Average</option>
                                <option value="2">Weighted Moving Average</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periode</label>
                            <select type="text" class="form-control" name="periode">
                                <option value="">Pilih Periode</option>
                                @for ($i = 3; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }} Bulan</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Periode Awal Peramalan</label>
                            <input type="text" class="form-control datepicker" name="periode_awal">
                        </div>
                        <div class="form-group">
                            <label>Peride Akhir Peramalan</label>
                            <input type="text" class="form-control datepicker" name="periode_akhir">
                        </div>
                        <div id="tampung"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Hitung</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        $(document).ready(function() {

            $("select[name='metode']").change(function() {
                var metode = $(this).val();
                var periode = $("select[name='periode']").val();
                if (metode != '' && periode != '') {
                    if (metode == 2) {
                        var html = '';
                        if (periode <= 3) {
                            html += `
                                <div class="form-group">
                                <label>Weighted Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 2 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 3 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>`;
                        } else {
                            html += `
                                <div class="form-group">
                                <label>Weighted Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 2 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 3 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>`;

                            for (var i = 4; i <= periode; i++) {
                                html += `
                                    <div class="form-group">
                                    <label>Weighted ${i} Bulan Lalu</label>
                                    <input type="number" class="form-control" name="weighted[]">
                                </div>
                                `;
                            }
                        }
                        $('#tampung').html(html);
                    }
                } else {
                    $('#tampung').empty();
                }
            });

            $("select[name='periode']").change(function() {
                var metode = $("select[name='metode']").val();
                var periode = $(this).val();
                if (metode != '' && periode != '') {
                    if (metode == 2) {
                        var html = '';
                        if (periode <= 3) {
                            html += `
                                <div class="form-group">
                                <label>Weighted Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 2 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 3 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>`;
                        } else {
                            html += `
                                <div class="form-group">
                                <label>Weighted Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 2 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>
                            <div class="form-group">
                                <label>Weighted 3 Bulan Lalu</label>
                                <input type="number" class="form-control" name="weighted[]">
                            </div>`;

                            for (var i = 4; i <= periode; i++) {
                                html += `
                                    <div class="form-group">
                                    <label>Weighted ${i} Bulan Lalu</label>
                                    <input type="number" class="form-control" name="weighted[]">
                                </div>
                                `;
                            }
                        }
                        $('#tampung').html(html);
                    }
                } else {
                    $('#tampung').empty();
                }
            });
        });

        function fungsiEdit(data) {
            var data = JSON.parse(data);
            var tanggal = data.nama_peramalan.split('-');
            $('#ubahModal').modal('show');
            $('#ubahModal form').attr('action', '{{ url('peramalan') }}/' + data.id);
            $('#ubahModal form input[name=nama_peramalan]').val(tanggal[1] + '-' + tanggal[0]);
            $(".datepicker").datepicker("update", tanggal[1] + '-' + tanggal[0]);
        }
    </script>

    @if (count($peramalan) > 0)
        <script>
            var kosong = 0;

            var error = 0;
            $('.error').each(function() {
                if ($(this).text() == '') {
                    kosong++;
                } else {
                    error += parseFloat($(this).text());
                }
            });
            $('#error').text(error);

            var mape = 0;
            $('.mape').each(function() {
                if ($(this).text() != '') {
                    mape += parseFloat($(this).text());
                }
            });
            $('#mape').text(mape + ' %');

            var mad = 0;
            $('.mad').each(function() {
                if ($(this).text() != '') {
                    mad += parseFloat($(this).text());
                }
            });
            $('#mad').text(mad);

            var mse = 0;
            $('.mse').each(function() {
                if ($(this).text() != '') {
                    mse += parseFloat($(this).text());
                }
            });
            $('#mse').text(mse);

            var total = $('.permintaan').length;

            var jum_mov = 0;
            for (var i = 1; i <= kosong; i++) {
                jum_mov += parseFloat($('.permintaan')[total - i].innerText);
            }

            $('#ave_error').text(parseInt(error / (total - kosong)));
            $('#ave_mape').text(parseInt(mape / (total - kosong)) + ' %');
            $('#ave_mad').text(parseInt(mad / (total - kosong)));
            $('#ave_mse').text(parseInt(mse / (total - kosong)));

            var standar_error = parseInt(mse / (total - kosong));
            standar_error = parseInt(Math.sqrt(standar_error));

            $('#standar_error').text(standar_error);

            // $('#bulan_depan').text(numberWithCommas(Math.ceil(jum_mov / kosong)));
            var label = @json($label);
            var aktual = @json($aktual);
            var hasil = @json($hasil);

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                            label: 'Data Aktual',
                            data: aktual,
                            fill: true,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        },
                        {
                            label: 'Data Peramalan',
                            data: hasil,
                            fill: true,
                            borderColor: 'rgb(255, 99, 132)',
                            tension: 0.1
                        }
                    ]
                }
            });
        </script>
    @endif
@endsection
