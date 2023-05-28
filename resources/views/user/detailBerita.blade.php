@extends('user\atribut')
@section('atributs')
    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container pt-5 mt-5">
          <div class="row g-5">
            <div class="col-lg-7">
              <div class="section-title position-relative pb-3 mb-5">
                <h5 class="fw-bold text-secondary text-uppercase">berita terkini</h5>
                <h1 class="mb-0">{{ $beritas->judul }}</h1>
              </div>
              <p class="mb-4">
                {!!$beritas->konten!!}
              </p>
              {{-- <div class="row g-0 mb-3">
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                  <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>Award Winning</h5>
                  <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>Professional Staff</h5>
                </div>
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                  <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>24/7 Support</h5>
                  <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>Fair Prices</h5>
                </div>
              </div> --}}
              <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                <div class="ps-4">
                </div>
              </div>
            </div>
            <div class="col-lg-5" style="min-height: 500px">
              <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('storage/berita/' .$beritas->gambar)}}" style="object-fit: cover" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- About End -->
@endsection