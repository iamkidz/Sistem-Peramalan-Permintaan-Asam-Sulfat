<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/gif" sizes="16x16">

    @include('layouts.styles')

    <title>Sistem Peramalan Permintaan Asam Sulfat</title>
</head>

<body class="bg-light">
    @include('layouts.navbar')

    <div class="container">
        @sectionMissing('peramalan')
            <div class="row py-3 mt-3">
                <div class="col-md-4 col-sm-12 mb-3">
                    @hasSection('chart')
                        @yield('chart')
                    @else
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_2018" width="auto" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_2019" width="auto" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_2020" width="auto" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
                <div class="col-md-8 col-sm12 mb-3">
                    @yield('content')
                </div>
            </div>
        @else
            @yield('peramalan')
        @endif
    </div>

    @include('layouts.scripts')


    @sectionMissing('peramalan')
        @sectionMissing('chart')

            @php
                $color_2018 = [];

                $periode_2018 = App\Models\Periode::whereYear('nama_periode', '2018')
                    ->select('id')
                    ->get()
                    ->toArray();

                $permintaan_2018 = App\Models\Permintaan::whereIn('id_periode', $periode_2018)
                    ->select('jumlah_permintaan', 'id_periode')
                    ->with('periode')
                    ->get();

                $jumlah_permintaan_2018 = [];
                $label_2018 = [];

                for ($i = 0; $i < count($periode_2018); $i++) {
                    $color_2018[$i] = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 1)';
                }

                foreach ($permintaan_2018 as $item) {
                    $jumlah_permintaan_2018[] = $item->jumlah_permintaan;
                }

                foreach ($permintaan_2018 as $item) {
                    $label_2018[] = tgl_indo($item->periode->nama_periode);
                }

                $color_2019 = [];

                $periode_2019 = App\Models\Periode::whereYear('nama_periode', '2019')
                    ->select('id')
                    ->get()
                    ->toArray();

                $permintaan_2019 = App\Models\Permintaan::whereIn('id_periode', $periode_2019)
                    ->select('jumlah_permintaan', 'id_periode')
                    ->with('periode')
                    ->get();

                $jumlah_permintaan_2019 = [];
                $label_2019 = [];

                for ($i = 0; $i < count($periode_2019); $i++) {
                    $color_2019[$i] = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 1)';
                }

                foreach ($permintaan_2019 as $item) {
                    $jumlah_permintaan_2019[] = $item->jumlah_permintaan;
                }

                foreach ($permintaan_2019 as $item) {
                    $label_2019[] = tgl_indo($item->periode->nama_periode);
                }

                $color_2020 = [];

                $periode_2020 = App\Models\Periode::whereYear('nama_periode', '2020')
                    ->select('id')
                    ->get()
                    ->toArray();

                $permintaan_2020 = App\Models\Permintaan::whereIn('id_periode', $periode_2020)
                    ->select('jumlah_permintaan', 'id_periode')
                    ->with('periode')
                    ->get();

                $jumlah_permintaan_2020 = [];
                $label_2020 = [];

                for ($i = 0; $i < count($periode_2020); $i++) {
                    $color_2020[$i] = 'rgba(' . rand(0, 255) . ', ' . rand(0, 255) . ', ' . rand(0, 255) . ', 1)';
                }

                foreach ($permintaan_2020 as $item) {
                    $jumlah_permintaan_2020[] = $item->jumlah_permintaan;
                }

                foreach ($permintaan_2020 as $item) {
                    $label_2020[] = tgl_indo($item->periode->nama_periode);
                }

            @endphp
            <script>
                function random_rgba() {
                    var o = Math.round,
                        r = Math.random,
                        s = 255;
                    return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
                }

                const ctx = document.getElementById('chart_2018').getContext('2d');
                const chart_2018 = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($label_2018),
                        datasets: [{
                            data: @json($jumlah_permintaan_2018),
                            backgroundColor: @json($color_2018),
                            borderColor: @json($color_2018),
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Permintaan 2018'
                            },
                            legend: {
                                display: false,
                            }
                        },
                    }
                });

                const ctx_2019 = document.getElementById('chart_2019').getContext('2d');
                const chart_2019 = new Chart(ctx_2019, {
                    type: 'bar',
                    data: {
                        labels: @json($label_2019),
                        datasets: [{
                            data: @json($jumlah_permintaan_2019),
                            backgroundColor: @json($color_2019),
                            borderColor: @json($color_2019),
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Permintaan 2019'
                            },
                            legend: {
                                display: false,
                            }
                        },
                    }
                });

                const ctx_2020 = document.getElementById('chart_2020').getContext('2d');
                const chart_2020 = new Chart(ctx_2020, {
                    type: 'bar',
                    data: {
                        labels: @json($label_2020),
                        datasets: [{
                            data: @json($jumlah_permintaan_2020),
                            backgroundColor: @json($color_2020),
                            borderColor: @json($color_2020),
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Permintaan 2020'
                            },
                            legend: {
                                display: false,
                            }
                        },
                    }
                });
            </script>
        @endif
    @endif


    @yield('js')

    @include('sweetalert::alert')
    @if ($errors->any())
        <div id="ERROR_COPY" style="display: none;" class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h6>{{ $error }}</h6>
            @endforeach
        </div>
    @endif

    @if (config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif
    <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    <script type="text/javascript">
        var cekError = {{ $errors->any() > 0 ? 'true' : 'false' }};
        var ht = $("#ERROR_COPY").html();
        if (cekError) {
            Swal.fire({
                title: 'Errors',
                icon: 'error',
                html: ht,
                showCloseButton: true,
            });
        }

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Apakah kamu yakin ?',
                text: "Data akan dihapus dari database",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya, Hapus !",
                cancelButtonText: "Batal",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    console.log(form.attr('action'));
                    form.submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Dibatalkan !',
                        'Data tidak berhasil terhapus',
                        'error'
                    )
                }
            });
        });
    </script>
</body>

</html>
