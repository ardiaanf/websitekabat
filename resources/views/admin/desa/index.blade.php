@extends('backends.master')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
<h3 class="page-title">Desa</h1>
    @endsection

@section('content')
<div class="page-content-wrapper">
                 <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                        <button style=" width: 90px; height: 38px; font-size: 16px; border-radius: 4px;  float: right;  padding: 2px 2px;  margin-top: 25px;" type="button"  class="btn btn-primary waves-light btn-sm waves-effect"
                                        data-toggle="modal" data-target="#ssmodal">Tambah</button>
                                            <h4 class="mt-0 header-title">Desa</h4>
                                       <p class="text-muted m-b-30 font-14">Halaman Desa</p>
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                  <thead>
                                  <tr>
                                  <th width="10px">No</th>
                                  <th>Nama Desa</th>
                                  <th class="text-center"width="80px">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($dessa as $data)
                                   
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $data->nama_desa }}</td>
                                    
                                        <td>
                                            <form action="" method="post">
                                                <a href=""
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit fa-lg"></i></a> 
                                               
                                                <button class="btn btn-danger btn-sm"> <i
                                                        class=" fa fa-trash fa-lg"></i></button>
                                                        </form>
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
                    <div class="modal fade" id="ssmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>  
      </div>
      <div class="modal-body">
      <form action="{{ route('desa.store') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
            
        <div class="form-group">
    <label for="">Nama Desa</label>
    <input type="text" class="form-control" id="" aria-describedby="de" placeholder="" name="nama_desa">
    <small id="de" class="form-text text-muted">Masukkan Nama Desa</small>
  </div>
                                
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i
                                    class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                            <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                                Simpan</button>
                        </div>
</form>
</div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });

        $("#banner").addClass("active");

    </script>

@endsection
