
<div class="left side-menu">
    <div class="topbar-center">
        <div class="logo">
            <img src="{{ asset('assets/images/logoBwi.png') }}" height="62" style="margin-left: 10px;">
            <span style="color: #E1E8ED; text-shadow: 1px 1px 2px #E1E8ED; font-size: 32px; font-family: serif;">Kabat</span>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Log</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="@if(Request::is('/')) active @endif">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="@if(Request::is('struKec*') || Request::is('umkm*') || Request::is('berita*')) active @endif">
                        <i class="fas fa-building fa-lg"></i>
                        <span>Kecamatan<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('struKec.view') }}">Struktur Kecamatan</a></li>
                        <li><a href="{{ route('umkm.view') }}">Umkm</a></li>
                        <li><a href="{{ route('berita.view') }}">Berita</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="@if(Request::is('desa*') || Request::is('struktur*') || Request::is('potensi*')) active @endif">
                        <i class="fas fa-archway fa-lg"></i>
                        <span>Desa<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('desa.view') }}">Nama Desa</a></li>
                        <li><a href="{{ route('struktur.view') }}">Struktur Desa</a></li>
                        <li><a href="{{ route('potensi.view') }}">Potensi Desa</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('unggah.view') }}" class="@if(Request::is('unggah*')) active @endif">
                        <i class="fas fa-file fa-lg"></i>
                        <span>Unggah File</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengumuman.view') }}" class="@if(Request::is('pengumuman*')) active @endif">
                        <i class="fas fa-bullhorn fa-lg"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.live-chat') }}" class="@if(Request::is('pengumuman*')) active @endif">
                        <i class="fas fa-bullhorn fa-lg"></i>
                        <span>Tes</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

