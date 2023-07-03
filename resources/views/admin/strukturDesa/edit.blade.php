@extends('backends.master')

@section('css')
<!-- Summernote css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')

<h3 class="page-title">Edit Struktur Desa</h1>
@endsection

@section('content')

      <div class="page-content-wrapper">
            <div class="container-fluid">  
           
                                                
            
                    <div class="row">
                         <div class="col-12">
                          
                                <div class="card m-b-20">
                                 <div class="card-body">
                                 <form method="post" action="{{route('struktur.update', $editData->id)}}" enctype="multipart/form-data">
                          @csrf
                                               
                                          <div class="form-grup mb-3">
                                                     <label  for="desa_id"  style="color: #686868;"class="col-sm-7 col-form-label">-Pilih Desa</label>
                                                     <select class="form-select  " aria-label="Default select example" name="desa_id"
                                            id="desa_id">
                        
                                            @foreach ($desa as $potensi)
                                            <option value="{{$potensi->id}}" {{ $potensi->id == $editData->desa_id ? 'selected' : '' }}>
                                           {{ $potensi->nama_desa}}
                                            </option>
                                            @endforeach
                                            </select>
                                             </div>

                                                <div class="form-grup mb-3">
                                                <label for="" style="color: #686868;"  class="col-sm-7 col-form-label">-Nama</label>
                                                    <input  type="text" class="form-control" name="nama" value="{{$editData->nama }}" id="nama" placeholder="Masukkan Judul"></div>
   
                                                     <div class="form-group mb-3">
                                                     <label for="jabatan" style="color: #686868;" class="col-sm-7 col-form-label">- Pilih Jabatan</label>
                                                     <select class="form-select" aria-label="Default select example" name="jabatan" id="jabatan">
                                                     @foreach ($jabatanDesa as $option)
                                                     <option value="{{ $option }}" {{ $editData->jabatan == $option ? 'selected' : '' }}>
                                                     {{ $option }}
                                                     </option>
                                                     @endforeach
                                                     </select>
                                                     </div>
                           
                                                 <div class="form-grup mb-3">
                                                <label for=""  style="color: #686868;" class="col-sm-7 col-form-label ">-Foto Profil</label>
                                                <div class="py-2">
                                                <img src="{{ asset('storage/strukturDesa/foto/' . $editData->fotoProfil) }}" height="100" alt="">
                                                 </div>
                                                 <input type="file" class="form-control filestyle  " name="fotoProfil" value="" data-buttonname="btn-secondary" >
                                                 </div>  

                                           <button type="submit" style=" width: 90px; height: 38px; font-size: 16px; border-radius: 4px;  float: right; margin-top:15px; "  class="btn btn-success waves-light btn-sm waves-effect">Simpan</button>
                                        </div>
                                    </div>
                                   
                        </div> <!-- end col -->

                </div> <!-- end row -->
                </form>
            
                                               
            </div><!-- container -->

    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!--Summernote js-->
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

  <!-- Plugins js -->
  <script src="{{ URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

        <!-- Plugins Init js -->
        <script src="{{ URL::asset('assets/pages/form-advanced.js') }}"></script>
@endsection

