@extends('user\atribut')
@section('atributs')
    
    <!-- Navbar & Carousel Start -->
      <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="img/carousel-1.jpg" alt="Image" />
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-3" style="max-width: 900px">
                <h3 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang Di</h3>
                <h1 class="display-1 text-white mb-md-4 animated zoomIn"> Sistem Informasi Kecamatan Kabat</h1>
              </div>
            </div>
          </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, 0.7)">
          <div class="modal-header border-0">
            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex align-items-center justify-content-center">
            <div class="input-group" style="max-width: 600px">
              <input type="text" class="form-control bg-transparent border-secondary p-3" placeholder="Type search keyword" />
              <button class="btn btn-secondary px-4"><i class="bi bi-search"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
      <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
          <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
            <div class="bg-secondary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px">
              <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px">
                <i class="fa fa-users text-secondary"></i>
              </div>
              <div class="ps-4">
                <h5 class="text-white mb-0">Happy Clients</h5>
                <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
              </div>
            </div>
          </div>
          <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
            <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px">
              <div class="bg-secondary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px">
                <i class="fa fa-check text-white"></i>
              </div>
              <div class="ps-4">
                <h5 class="text-secondary mb-0">Projects Done</h5>
                <h1 class="mb-0" data-toggle="counter-up">12345</h1>
              </div>
            </div>
          </div>
          <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
            <div class="bg-secondary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px">
              <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px">
                <i class="fa fa-award text-secondary"></i>
              </div>
              <div class="ps-4">
                <h5 class="text-white mb-0">Win Awards</h5>
                <h1 class="text-white mb-0" data-toggle="counter-up">12345</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Facts Start -->

    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-7">
            <div class="section-title position-relative pb-3 mb-5">
              <h5 class="fw-bold text-secondary text-uppercase">Profil</h5>
              <h1 class="mb-0">Kecamatan Kabat</h1>
            </div>
            <p class="mb-4">
              Kecamatan Kabat merupakan salah satu kecamatan yang wilayahnya berbatasan langsung dengan Kota Banyuwangi (Kecamatan Kota Banyuwangi). Maka dari itu sebagian wilayahnya seperti Desa Kalirejo dan Desa Dadapan merupakan wilayah penyangga Kota Banyuwangi. Kecamatan memiliki sebuah objek wisata bernama Pemandian air terjun Antogan yang terletak di Desa Bunder.
            </p>
            <div class="row g-0 mb-3">
              <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>Award Winning</h5>
                <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>Professional Staff</h5>
              </div>
              <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>24/7 Support</h5>
                <h5 class="mb-3"><i class="fa fa-check text-secondary me-3"></i>Fair Prices</h5>
              </div>
            </div>
            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
              <div class="ps-4">
              </div>
            </div>
          </div>
          <div class="col-lg-5" style="min-height: 500px">
            <div class="position-relative h-100">
              <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/about.jpg" style="object-fit: cover" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px">
          <h5 class="fw-bold text-secondary text-uppercase">Pelayanan</h5>
          <h1 class="mb-0">Publik Kecamatan Kabat</h1>
        </div>
        <div class="row g-5">
              <div class="col-lg-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px">
                  <i class="fa fa-cubes text-white"></i>
                </div>
                <h4>Pelayanan penertiban KTP</h4>
              </div>
              <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px">
                  <i class="fa fa-award text-white"></i>
                </div>
                <h4>Pelayanan pencetakan kartu keluarga (LKK)</h4>
            </div>
              <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px">
                  <i class="fa fa-award text-white"></i>
                </div>
                <h4>Pelayanan surat pernyataan miskin (online)</h4>
              </div>
              <div class="col-lg-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px">
                  <i class="fa fa-users-cog text-white"></i>
                </div>
                <h4>Pelayanan penduduk pindah datang dan keluar</h4>
              </div>
              <div class="col-lg-4 wow zoomIn" data-wow-delay="0.8s">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px">
                  <i class="fa fa-phone-alt text-white"></i>
                </div>
                <h4>Pelayanan rekomendasi surat keterangan catatan kepolisian (SKCK)</h4>
              </div>
            </div>
          </div>
        </div>
    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px">
          <h5 class="fw-bold text-secondary text-uppercase">Testimonial</h5>
          <h1 class="mb-0">What Our Clients Say About Our Digital Services</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
          <div class="testimonial-item bg-light my-4">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
              <img class="img-fluid rounded" src="img/testimonial-1.jpg" style="width: 60px; height: 60px" />
              <div class="ps-4">
                <h4 class="text-secondary mb-1">Client Name</h4>
                <small class="text-uppercase">Profession</small>
              </div>
            </div>
            <div class="pt-4 pb-5 px-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</div>
          </div>
          <div class="testimonial-item bg-light my-4">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
              <img class="img-fluid rounded" src="img/testimonial-2.jpg" style="width: 60px; height: 60px" />
              <div class="ps-4">
                <h4 class="text-secondary mb-1">Client Name</h4>
                <small class="text-uppercase">Profession</small>
              </div>
            </div>
            <div class="pt-4 pb-5 px-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</div>
          </div>
          <div class="testimonial-item bg-light my-4">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
              <img class="img-fluid rounded" src="img/testimonial-3.jpg" style="width: 60px; height: 60px" />
              <div class="ps-4">
                <h4 class="text-secondary mb-1">Client Name</h4>
                <small class="text-uppercase">Profession</small>
              </div>
            </div>
            <div class="pt-4 pb-5 px-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</div>
          </div>
          <div class="testimonial-item bg-light my-4">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
              <img class="img-fluid rounded" src="img/testimonial-4.jpg" style="width: 60px; height: 60px" />
              <div class="ps-4">
                <h4 class="text-secondary mb-1">Client Name</h4>
                <small class="text-uppercase">Profession</small>
              </div>
            </div>
            <div class="pt-4 pb-5 px-5">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px">
          <h5 class="fw-bold text-secondary text-uppercase">Berita Kecamatan</h5>
          <h1 class="mb-0">Berita Terbaru</h1>
        </div>
              <div class="row g-5">
                @foreach ($beritas as $berita)
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                  <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                      <img class="img-fluid1" src="{{asset('storage/berita/' .$berita->gambar)}}" alt="" title="" />
                      <a class="position-absolute top-0 start-0 bg-secondary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a>
                    </div>
                    <div class="p-4">
                      <div class="d-flex mb-3">
                        <small class="me-3"><i class="far fa-user text-secondary me-2"></i></small>
                        <small><i class="far fa-calendar-alt text-secondary me-2"></i>01 Jan, 2045</small>
                      </div>
                      <h4 class="mb-3">{{ $berita->judul }}</h4>
                      <p class="text">{!! $berita->konten !!}</p>
                      <a class="text-uppercase" href="{{url('detail_berita',$berita->id)}}">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
          @endforeach
              </div>
      </div>
    </div>
          
    
    <!-- Blog Start -->

    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5 mb-5">
        <div class="bg-white">
          <div class="owl-carousel vendor-carousel">
            <img src="img/vendor-1.jpg" alt="" />
            <img src="img/vendor-2.jpg" alt="" />
            <img src="img/vendor-3.jpg" alt="" />
            <img src="img/vendor-4.jpg" alt="" />
            <img src="img/vendor-5.jpg" alt="" />
            <img src="img/vendor-6.jpg" alt="" />
            <img src="img/vendor-7.jpg" alt="" />
            <img src="img/vendor-8.jpg" alt="" />
            <img src="img/vendor-9.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    <!-- Vendor End -->
@endsection
