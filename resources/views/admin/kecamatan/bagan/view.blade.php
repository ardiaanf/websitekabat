@extends('backends.master')

@section('css')
<!-- C3 charts css -->
<link href="{{ URL::asset('assets/plugins/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Dashboard</h1>
@endsection

@section('content')
<div class="page-content-wrapper">
<div class="container-fluid">
    <div class="row">
        <h2>tesbagana</h2>
    </div>
</div><!-- container -->
</div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="{{ URL::asset('assets/plugins/peity-chart/jquery.peity.min.js') }}"></script>
<!--C3 Chart-->
<script type="text/javascript" src="{{ URL::asset('assets/plugins/d3/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/plugins/c3/c3.min.js') }}"></script>
<!-- KNOB JS -->
<script src="{{ URL::asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<!-- Page specific js -->
<script src="{{ URL::asset('assets/pages/dashboard.js') }}"></script>
@endsection

