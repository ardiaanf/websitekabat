@extends('backends.master')

@section('css')
<!-- Summernote css -->
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')

<h3 class="page-title">Edit Desa</h1>
@endsection

@section('content')

      <div class="page-content-wrapper">
            <div class="container-fluid">  
                    <div class="row">
                         <div class="col-12">
                                <div class="card m-b-20">
                                 <div class="card-body">
                                 <form method="post" action="{{route('desa.update', $editData->id)}}" enctype="multipart/form-data">
                          @csrf
                           <div class="form-group">
                            <input type="text" class="form-control" id="" aria-describedby="de" placeholder="" name="nama_desa" value="{{$editData->nama_desa}}">
                               </div>

                        <label class="sr-only" for="luasDesa">Luas Desa</label>
                        <div class="input-group mb-2 mr-sm-2">
                         <input type="text" class="form-control" id="luasDesa" placeholder="Luas Desa" name="luas_desa" value="{{number_format($editData->luas_desa,3)}}">
                         <div class="input-group-prepend">
                         <div class="input-group-text">(km2/sq.km)</div>
                       </div>
                       </div>

                        <div class="form-group">                  
                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Jumlah Penduduk" name="jumlah_penduduk" value="{{number_format($editData->jumlah_penduduk)}}">
                        </div>

                        <div class="form-grup mb-3">
                        <textarea type="text" id="summernote" class="form-control" name="tentang_desa">{{$editData->tentang_desa}}</textarea>                                              
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

        <!--Summernote js-->
        <script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

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
            ['insert', ['picture']],
            ['insert', ['video']],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen' ] ]
        ]
    });
            

            });
      
</script>
@endsection


