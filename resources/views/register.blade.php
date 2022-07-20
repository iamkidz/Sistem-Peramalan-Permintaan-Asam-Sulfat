<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/gif" sizes="16x16">

    <title>Sistem Peramalan Permintaan Asam Sulfat</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">


    <style>
        .bg-gradient-success {
            background-color: white;
        }

        input {
            font-size: 11pt !important;
            padding: 10px 10px;
        }
    </style>

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center my-3">

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <div class="p-3">
                            <div class="text-center">
                                <img src="{{ asset('img/logo.png') }}" width="40%" class="mb-3" />
                                <h2 class="h4 text-gray-900">Sistem Peramalan Permintaan Asam Sulfat<br></h2>
                                <h2 class="h4 text-gray-900 mb-5">PT. Petrokimia Gresik</h2>
                            </div>
                            <form class="user" action="{{ url('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama"
                                        placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="no_hp"
                                        placeholder="No HP">
                                </div>
                                <div class="form-group">
                                    <select type="text" class="form-control" name="jabatan">
                                        <option value="">Pilih Jabatan</option>
                                        <option value="manager">Manager Produksi</option>
                                        <option value="kepala">Kepala Produksi</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block mt-1"
                                    style="font-size:1rem;">
                                    Register
                                </button>
                                <hr>
                                <div class="text-center mb-2">
                                    <span class="text-muted">Sudah punya akun ?</span>
                                </div>
                                <a href="{{ url('/') }}" class="btn btn-warning btn-user btn-block mt-1"
                                    style="font-size:1rem;">
                                    Login
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


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
    </script>

    @include('sweetalert::alert')
</body>

</html>
