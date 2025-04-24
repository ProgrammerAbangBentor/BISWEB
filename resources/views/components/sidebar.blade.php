<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="logo" width="130">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BW</a>
        </div>
        <br><br><hr>

        @php $type_menu = $type_menu ?? ''; @endphp

        <ul class="sidebar-menu">
            {{-- Dashboard (semua role bisa lihat) --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}">
                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>

            {{-- Hanya tampilkan menu admin jika role = admin --}}
            @if (auth()->user()->role === 'admin')
                <li class="menu-header">Starter</li>
                <li class="{{ Request::is('users') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('users') }}">
                        <i class="fas fa-users"></i> <span>Data User</span>
                    </a>
                </li>
                <li class="{{ Request::is('data-master') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('data-master') }}">
                        <i class="fas fa-file"></i> <span>Data Master</span>
                    </a>
                </li>
                <li class="{{ Request::is('laporan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('laporan') }}">
                        <i class="fas fa-gear"></i> <span>Laporan</span>
                    </a>
                </li>
            @endif

            {{-- Menu ini bisa dilihat semua role --}}
            <li class="{{ Request::is('profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile') }}">
                    <i class="fas fa-file"></i> <span>Data Siswa / Guru</span>
                </a>
            </li>

            {{-- Logout --}}
            <li class="{{ Request::is('logout') ? 'active' : '' }}">
                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </aside>
</div>
