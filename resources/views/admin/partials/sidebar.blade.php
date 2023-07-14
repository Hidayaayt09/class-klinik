<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('admin-tem/assets/img/admin.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Laa Tachzan
                            <span class="user-level">{{ Auth::guard('admin')->user()->nama }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.profil') }}">
                                    <span class="link-collapse">Lihat Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="link-collapse">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-success">
                <li class="nav-item @yield('dashboard')">
                    <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item @yield('kategori')">
                    <a href="{{ route('admin.kategori') }}">
                        <i class="fas fa-book"></i>
                        <p>Kategori Konsultasi</p>
                    </a>
                </li>
                <li class="nav-item @yield('gejala')">
                    <a href="{{ route('admin.gejala') }}">
                        <i class="fas fa-stethoscope"></i>
                        <p>Gejala</p>
                    </a>
                </li>
                <li class="nav-item @yield('konseling')">
                    <a href="{{ route('admin.konseling') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Konsultasi</p>
                    </a>
                </li>
                <li class="nav-item @yield('jadwal')">
                    <a href="{{ route('admin.jadwal') }}">
                        <i class="fas fa-table"></i>
                        <p>Jadwal Konsultasi</p>
                    </a>
                </li>
                <li class="nav-item @yield('testimoni')">
                    <a href="{{ route('admin.testimoni') }}">
                        <i class="far fa-comments"></i>
                        <p>Testimonial</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
