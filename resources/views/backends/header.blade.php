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
            <a href="faq" ><i class="mdi mdi-view-dashboard"></i></i><span>Dashboard</span></a>
        </li>

        <li class="has_sub">
                <a href="javascript:void(0);" ><i class="fas fa-building fa-lg"></i></i><span>Kecamatan<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="">Struktur Kecamatan</a></li>
                    <li><a href="{{route('berita.view')}}">Berita</a></li>
                    <li><a href="{{route('umkm.view')}}">Umkm</a></li>
                    <li><a href="{{route('banner.view')}}">Banner</a></li>
                </ul>
            </li>

        <li class="has_sub">
                <a href="javascript:void(0);" ><i class="fas fa-archway fa-lg"></i><span>Desa<span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="{{route('index.view')}}">Nama Desa</a></li>
                    <li><a href="{{route('potensi.view')}}">Potensi Desa</a></li>
                    <li><a href="{{route('indexDesa.view')}}">Struktur Desa</a></li>
                </ul>
            </li>

</ul>

    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
