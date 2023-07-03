@extends('backends.master')
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
@endsection

@section('breadcrumb')
<h3 class="page-title">Struktur Kecamatan</h1>
@endsection
@section('content')
<div class="page-content-wrapper">
                 <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                        <a href="{{route('struKec.add')}}"><button style=" width: 90px; height: 38px; font-size: 16px; border-radius: 4px;  float: right;  padding: 2px 2px;  margin-top: 25px;" type="button"  class="btn btn-primary waves-light btn-sm waves-effect">Tambah</button></a>
                                            <h4 class="mt-0 header-title">Struktur Kecamatan</h4>
                                       <p class="text-muted m-b-30 font-14">Halaman Struktur Kecamatan.
                                            </p>
                                            <table id="datatable" class="table table-bordered dt-responsive" cellspacing="0"
                                width="100%">
                                       <thead>
                                       <tr>
                                       <th width="10px">No</th>
                                       <th>Nama</th>
                                       <th>Jabatan</th>
                                       <th>Foto Profil</th>
                                       <th class="text-center"width="80px">Action</th>
                                       </tr>
                                      </thead>

                                     <tbody>
                                    @foreach($kec as $data)
                                     <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td style="max-width:100px;">{{$data->nama}}</td> 
                                    <td style="max-width:150px;">{{$data->jabatan}}</td>
                                     <td> 
                             @if ($data->fotoProfil)
    <img src="{{ asset('storage/strukturKec/foto/' .$data->fotoProfil) }}" width="80px" alt="Image">
    @else
    <img src="{{asset('assets/images/blank.png')}}"  width="80px" alt="tidak ada gambar">
@endif
    </td>

    <td>
    
    <a href="{{ route('struKec.edit', $data->id) }}"class="btn btn-warning btn-sm"><i class="fa fa-edit fa-lg"></i></a>
    <a href="{{route('struKec.delete', $data->id)}}" id="delete"
    class="btn btn-danger btn-sm"  ><i class="fa fa-trash fa-lg"></i></a>
    
    

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>

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