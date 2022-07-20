<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('img/PG.png') }}" width="50" height="50"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                    
                @auth
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="dashboard">Dashboard</a>
                    </li>
                    @if (auth()->user()->jabatan == 'kepala')
                        <li class="nav-item {{ request()->is('permintaan') ? 'active' : '' }}">
                            <a class="nav-link" href="permintaan">Permintaan</a>
                        </li>
                        <li class="nav-item {{ request()->is('peramalan') ? 'active' : '' }}">
                            <a class="nav-link" href="peramalan">Prediksi</a>
                        </li>
                    @elseif(auth()->user()->jabatan == 'manager')
                        <li class="nav-item {{ request()->is('peramalan') ? 'active' : '' }}">
                            <a class="nav-link" href="peramalan">Prediksi</a>
                        </li>
                        <li class="nav-item {{ request()->is('laporan') ? 'active' : '' }}">
                            <a class="nav-link" href="laporan">Laporan</a>
                        </li>
                        <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
                            <a class="nav-link" href="user">User</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->nama }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    @method('POST')
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

