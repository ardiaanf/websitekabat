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

<h3 class="page-title">Tambah Potensi Add</h1>
@endsection

@section('content')

      <div class="page-content-wrapper">
            <div class="container-fluid">  
           
                                                
            
                    <div class="row">
                         <div class="col-12">
                          
                                <div class="card m-b-20">
                                 <div class="card-body">
                          <form method="post" action="{{route('potensi.store')}}" enctype="multipart/form-data">
                                @csrf  
                                                <!-- <div class="form-grup mb-3">
                                                <label for="" style="color: #686868;"  class="col-sm-7 col-form-label">-Judul Umkm</label>
                                                    <input  type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="" id="example-text-input"  placeholder="Masukkan Judul">
                                                    @error('judul')
                                                    <div class="invalid-feedback">
                                                    {{$message}}
                                                     </div>
                                                    @enderror
                                                     </div> -->

                                                     <div class="form-grup mb-3">
                                                     <label  for=""  style="color: #686868;"class="col-sm-7 col-form-label">-Pilih Desa</label>
                                                     <select class="form-select" aria-label="Default select example" name="desa_id"
                                            id="desa_id">
                                                     <option selected>Pilih Desa</option>
                                                     @foreach ($desa as $potensidesa)
                                            <option value="{{$potensidesa->id}}">{{$potensidesa->nama_desa}}</option>
                                            @endforeach
</select>
</div>
                                      
                                       <!-- <div class="form-group mb-3">
    <label for="exampleFormControlSelect1" style="color: #686868;"class="col-sm-7 col-form-label">-Pilih Desa</label>
    <select class="form-select"  name="desa_id" id="desa_id">
    <option selected>Pilih Desa</option>
    @foreach ($desa as $potensidesa)
      <option value="{{$potensidesa->id}}">{{$potensidesa->nama_desa}}</option>
      @endforeach
    </select>
  </div> -->

                                                        <div class="form-grup mb-3">
                                                <label for=""  style="color: #686868;" class="col-sm-7 col-form-label ">-Gambar Potensi Desa</label>
                                                 <input type="file" class="form-control filestyle " name="gambar_potensi" data-buttonname="btn-secondary" >
                                                 
                                                 </div>

                                               
                                                <!-- <div class="form-grup mb-3">
                                                <label for=""  style="color: #686868;" class="col-sm-7 col-form-label ">-Gambar Umkm</label>
                                                 <input type="file" class="form-control filestyle @error('gambar') is-invalid @enderror" name="gambar" data-buttonname="btn-secondary" >
                                                 @error('gambar')
                                                    <div class="invalid-feedback">
                                                    {{$message}}
                                                     </div>
                                                    @enderror
                                                 </div> -->
                                                
                                             <!--       <div class="form-grup mb-3">
                                                <label for="" style="color: #686868;"  class="col-sm-7 col-form-label">-Judul Umkm</label>
                                                    <input  type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="" id="example-text-input"  placeholder="Masukkan Judul">
                                                    @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                    {{$message}}
                                                     </div>
                                                    @enderror
                                                     </div> -->
                       
                                             <div class="form-grup mb-3">
                                                <label  for=""  style="color: #686868;"class="col-sm-7 col-form-label">-Deskripsi Potensi Desa</label>
                                                <textarea type="text" id="summernote" class="form-control  @error('deskripsi') is-invalid @enderror" name="potensi_desa"></textarea> 
                                              
                                              
                                            </div>  

                                           <button type="submit" style=" width: 90px; height: 38px; font-size: 16px; border-radius: 4px;  float: right; margin-top:15px; "  class="btn btn-info waves-light btn-sm waves-effect">Simpan</button>
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

@section('script-bottom')
<script>
         jQuery(document).ready(function(){
                $('#summernote').summernote({
                    
                    height: 300,
        toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
        ]
    });
            

            });
      
</script>
@endsection

