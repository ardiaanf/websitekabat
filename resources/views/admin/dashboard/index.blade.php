@extends('backends.master')

@section('css')
<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/morris/morris.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
@endsection

@section('breadcrumb')
<h3 class="page-title">Dashboard </h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                               
                            </div><!-- end row -->
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->

@endsection

@section('script')
<!-- Peity chart JS -->
<script src="{{ URL::asset('assets/plugins/peity-chart/jquery.peity.min.js') }}"></script>
<!--Morris Chart-->
<script src="{{ URL::asset('assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/raphael/raphael-min.js') }}"></script>
<!-- Page specific js -->
<script src="{{ URL::asset('assets/pages/dashborad-2.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>

<script>
    function showSuccessAlert() {
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Anda Berhasil Login',
        showConfirmButton: false,
        timer: 1500
})
    }
    </script>
    @if (session('success'))
    <script>
        showSuccessAlert();
    </script>
@endif
@endsection

