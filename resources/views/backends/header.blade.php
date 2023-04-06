<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

<!-- LOGO -->
<div class="topbar-center">

        <div class="logo "><img  src="{{asset('assets/images/logoBwi.png')}}" height="62" style="margin-left:10px;" >
        <span style=" color:#E1E8ED ;  text-shadow: 1px 1px 2px #E1E8ED; font-size:32px; font-family: serif; ">Kabat</span>
    </div>
</div>
<div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu">
        <ul>
        <li class="menu-title">Log</li>
        <li>
            <a href="/dashboard" ><i class="mdi mdi-view-dashboard"></i></i><span>Dashboard</span></a>
        </li>

        <li class="has_sub">
                <a href="javascript:void(0);" ><i class="fas fa-building fa-lg"></i></i><span>Kecamatan<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="/bagan">Bagan</a></li>
                </ul>
            </li>

        <li class="has_sub">
                <a href="javascript:void(0);" ><i class="fas fa-archway fa-lg"></i><span>Desa<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="/namadesa">Nama Desa</a></li>
                    <li><a href="/strukturdesa">Struktur Desa</a></li>
                    <li><a href="/potensidesa">Potensi Desa</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('banner.view')}}" ><i class="fas fa-images fa-lg"></i></i><span>Banner</span></a>
            </li>

        <li class="has_sub">
                <a href="javascript:void(0);" ><i class="fa-solid fa-hands-holding-child fa-lg"></i><span> Umkm<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="{{route('umkm.view')}}">Log Umkm</a></li>

                </ul>
            </li>


            <li>
                <a href="{{ route('berita.view') }}" ><i class="fa-solid fa-newspaper fa-lg"></i><span>Berita</span></a>
            </li>

</ul>

    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
