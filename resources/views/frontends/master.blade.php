<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assetsjs/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assetsjs/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assetsjs/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assetsjs/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assetsjs/css/style.css')}}" rel="stylesheet">

 
</head>

<body>

<div id="preloader"><div id="status"><div class="spinner text-success"></div></div></div>

  @include('frontends.topbar')
  @include('frontends.header')
  <main id="main">
    @yield('content')
</main>
    @include('frontends.footer')

  <!-- Vendor JS Files -->
  <script src="{{asset('assetsjs/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assetsjs/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assetsjs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assetsjs/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assetsjs/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assetsjs/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assetsjs/js/main.js')}}"></script>

</body>

</html>