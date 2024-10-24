@use(Illuminate\Support\Facades\Auth)
<div id="viewport">
    <div id="sidebar">
        <header>
            <a href="#">Laptop Choice</a>
        </header>
        <ul class="nav">
            <li>
                <a href="{{ route('dashboardUser') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('loan') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Peminjaman Laptop
                </a>
            </li>

            <li>
                <a href="{{ route('loan.history') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Riwayat Peminjaman
                </a>
            </li>

            <li class="logout">
                <a href="{{ route('logout') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <div id="content">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">@yield('title')</a>
                <a type="button" class="modalButton" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    {{ Auth::user()->name }}
                </a> 
                @include('layout.User.components.modalInformasi')
            </div>
        </nav>
        @yield('content')
    </div>
</div>
