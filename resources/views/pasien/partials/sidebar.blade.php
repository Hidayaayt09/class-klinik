<!-- Sidebar -->
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger
        chat-title="Laa tachzan Chatbot"
        agent-id="9e31bb61-a35f-4e7f-9cf3-cf9dca287f37"
        language-code="en"
        ></df-messenger>
        
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('admin-tem/img/user.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Laa Tachzan
                            <span class="user-level">{{ Auth::user()->nama }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('pasien.profil') }}">
                                    <span class="link-collapse">Lihat Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="link-collapse">Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-success">
                <li class="nav-item @yield('dashboard')">
                    <a href="{{ route('pasien.dashboard') }}" class="collapsed" aria-expanded="false">
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
                <li class="nav-item @yield('konseling')">
                    <a href="{{ route('pasien.konseling') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Konsultasi</p>
                    </a>
                </li>
                <li class="nav-item @yield('sesi')">
                    <a href="{{ route('pasien.sesi') }}">
                        <i class="fas fa-user-friends"></i>
                        <p>Sesi Konsultasi Online</p>
                    </a>
                </li>
                <li class="nav-item @yield('testimoni')">
                    <a href="{{ route('pasien.testimoni') }}">
                        <i class="far fa-comment"></i>
                        <p>Testimonial</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
