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
                          <form method="post" action="{{route('test.store')}}" enctype="multipart/form-data">
                                @csrf  
                                              
                       
                                @csrf
    <textarea id="summernote" name="content"></textarea>

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
        $(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
    });
});
      
</script>
@endsection

