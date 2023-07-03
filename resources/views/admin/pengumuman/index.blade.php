@extends('backends.master')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
<h3 class="page-title">Pengumuman</h3>
@endsection

@section('content')
<!-- Main content -->
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <button style="width: 90px; height: 38px; font-size: 16px; border-radius: 4px; float: right; padding: 2px 2px; margin-top: 25px;" type="button" class="btn btn-primary waves-light btn-sm waves-effect" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah</button>
                        <h4 class="mt-0 header-title">Pengumuman</h4>
                        <p class="text-muted m-b-30 font-14">Halaman Pengumuman</p>
                        <table id="datatable" class="table table-bordered dt-responsive" cellspacing="0"
                                width="100%">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Judul</th>
                                    <th class="text-center" width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peng as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td style="max-width:150px;">{{ $data->judul }}</td>
                                
                                    <td>
                                    <a href="{{route('pengumuman.show', $data->id)}}"class="btn btn-success btn-sm"><i class="fa fa-eye fa-lg"></i></a>
                                        <a href="{{route('pengumuman.edit', $data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-lg"></i></a>
                                        <a href="{{route('pengumuman.delete', $data->id)}}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-lg"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengumuman</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="" aria-describedby="de" placeholder="Judul" name="judul">
                            @error('judul')
                            <div class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                            </div>

                     
                        <div class="form-grup ">
                        <textarea type="text" id="summernote" class="form-control @error('content') is-invalid @enderror" name="content" ></textarea>
                        @error('content')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class='nav-icon fas fa-arrow-left'></i> &nbsp; Kembali</button>
                            <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan</button>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil!'
        });
    }
</script>
<script>
    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil!'
        });
    }
    </script>

    <script>
   $(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link=$(this).attr("href");
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-danger',
          cancelButton: 'btn btn-success'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Anda yakin??',
        text: "Data terhapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus!',
        cancelButtonText: 'Batal!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href=link
          swalWithBootstrapButtons.fire(
            'Terhapus!',
            'Data sudah dihapus.',
            'success'
          )
        } 
      })
    });
   });
</script>


@if (session('success'))
    <script>
        showSuccessAlert();
    </script>
@endif
@endsection

@section('script-bottom')
<script>
         jQuery(document).ready(function(){
                $('#summernote').summernote({
                    
                    height: 150,
                    placeholder:'Deskripsi Pengumuman',
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            ['insert', ['picture']],
            ['insert', ['video']],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen' ] ]
        ]
    });
            

            });
      
</script>
@endsection


