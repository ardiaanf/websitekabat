@extends('backends.master')

@section('css')
<!-- Summernote css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@endsection

@section('breadcrumb')

<h3 class="page-title">Potensi Desa</h1>
@endsection

@section('content')

      <div class="page-content-wrapper">
            <div class="container-fluid">  
                    <div class="row">
                         <div class="col-12">
                                <div class="card m-b-20">
                                 <div class="card-body">
                                 <a class="btn btn-secondary"
                                    style=" float: right; width: 90px; height: 38px; font-size: 16px; border-radius: 4px; margin-top:15px; "
                                    href="{{ route('potensi.view') }}">Kembali</a>

                                 
                                 <div class="form-grup mb-3">
                                    <h6 class="fw-bold mb-3" style="color: #686868;" >-Nama Desa</h6>
                                 <h3 class="fw-bold mb-3" value ="{{$showData->id}}">{{$showData->desas->nama_desa}}</h3>
                                      </div>
                                 
                                     <div class="form-grup mb-3">
                                    <h6 class="fw-bold mb-3" style="color: #686868;" >-Gambar Potensi Desa</h6>
                                 <img src="{{ asset('storage/potensidesa/gambar/' .$showData->gambar) }}" class="img-fluid rounded-4 mb-3" alt="">
                                    </div>

                                    <div class="form-grup mb-3">
                                    <h6 class="fw-bold mb-3" style="color: #686868;" >-Deskripsi Potensi Desa</h6>
                                     {!! $showData->content !!}
                                      </div>
                              
                               
                                        </div>
                                    </div>
                                   
                        </div> <!-- end col -->

                </div> <!-- end row -->
               
            
                                               
            </div><!-- container -->

    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
@endsection




