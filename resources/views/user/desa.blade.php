@extends('user\atribut')
@section('atributs')
<div class="container2">
    
    <div class="row height d-flex justify-content-center align-items-center">
        
        <div class="col-md-6">
          <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px">
              <h5 class="fw-bold text-secondary text-uppercase">Cari Desa</h5>
              <h1 class="mb-0">Cari Desamu Disini</h1>
            </div>

        <div class="form">
            <form action="/desa/cari" method="GET">
          <i class="fa fa-search"></i>
          <input type="text" name="cari" class="form-control form-input" placeholder="Cari Desa..." value="{{ old('cari') }}">
        </div>
        
      </div>
      
    </div>
    
  </div>
@endsection