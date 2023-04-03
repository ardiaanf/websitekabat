@extends('backends.master')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">UMKM</h1>
@endsection

@section('content')
       <div class="page-content-wrapper">
                 <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                        <a href="{{route('umkm.add')}}"><button style=" width: 90px; height: 38px; font-size: 16px; border-radius: 4px;  float: right;  padding: 2px 2px;  margin-top: 25px;" type="button"  class="btn btn-success waves-light btn-sm waves-effect">Tambah</button></a>
                                            <h4 class="mt-0 header-title">Log Umkm</h4>
                                       <p class="text-muted m-b-30 font-14">Data Umkm di Kecamatan Kabat.
                                            </p>
                                           
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

            
<thead>
<tr>
    <th width="10px">No</th>
    <th>Nama Umkm</th>
    <th>Gambar Umkm</th>
    <th class="text-center"width="100px">Action</th>

   
</tr>
</thead>


<tbody>
@foreach($allDataUmkm as $umkm)
<tr>
<th scope="row">{{$umkm->id}}</th>
    <td>{{$umkm->judul}}</td>
    
    <td>
        <img src="{{ asset('storage/umkm/' .$umkm->gambar) }}" width="180px" alt="Image">
    </td>
    
    <td>
    <a href=""class="btn btn-success btn-sm"><i class="fa fa-edit fa-lg"></i></a>

    <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
      

    </td>
   
   
</tr>
@endforeach

</tbody>
</table> 
                                      

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                         
                        </div><!-- container-fluid -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!-- Required datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>
@endsection

