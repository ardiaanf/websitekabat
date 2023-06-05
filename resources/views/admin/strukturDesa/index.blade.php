@extends('backends.master')
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Struktur Desa</h1>
@endsection
@section('content')
<div class="page-content-wrapper">
                 <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                        <a href="{{route('struktur.add')}}"><button style=" width: 90px; height: 38px; font-size: 16px; border-radius: 4px;  float: right;  padding: 2px 2px;  margin-top: 25px;" type="button"  class="btn btn-success waves-light btn-sm waves-effect">Tambah</button></a>
                                            <h4 class="mt-0 header-title">Struktur Desa</h4>
                                       <p class="text-muted m-b-30 font-14">Struktur Desa di Kecamatan Kabat.
                                            </p>
                                           
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

            
<thead>
<tr>
    <th width="10px">No</th>
    <th>Nama Desa</th>
    <th>Nama</th>
    <th>Jabatan</th>
    <th>Foto Profil</th>
   
    <th class="text-center"width="100px">Action</th>

   
</tr>
</thead>


<tbody>
@foreach($allDataStruktur as $data)

<tr>
<th scope="row">{{$data->id}}</th>
    <td>{{$data->desas->nama_desa}}</td>
    <td>{{$data->nama}}</td> 
    <td>{{$data->jabatan_desas->namaJabatan}}</td>
    <td> 
    @if ($data->fotoProfil)
    <img src="{{ asset('storage/strukturDesa/' .$data->fotoProfil) }}" width="180px" alt="Image">
    @else
    <p>No image available</p>
@endif
    </td>

    <td>
    <a href=""class="btn btn-info btn-sm"><i class="fa fa-eye fa-lg"></i></a>
    <a href=""class="btn btn-warning btn-sm"><i class="fa fa-edit fa-lg"></i></a>
   
    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
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