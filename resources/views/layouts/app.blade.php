<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'PPID') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="PPID Dispora Jabar, Pejabat Pengelola Informasi dan Dokumentasi" name="keywords">
    <meta content="Portal Resmi PPID Dinas Pemuda dan Olahraga Jawa Barat" name="description">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('import/assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ asset('import/assets/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('import/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="{{ asset('import/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('import/assets/css/modern-style.css') }}" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <div class="container">
            <a href="/" class="navbar-brand">
                <h2 class="m-0"><span class="text-primary">PPID</span> DISPORA JABAR</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#home" class="nav-item nav-link active">Home</a>
                    <a href="#about" class="nav-item nav-link">Profile</a>
                    <a href="#sources" class="nav-item nav-link">Informasi</a>
                    <a href="#portfolios" class="nav-item nav-link">Gallery</a>
                    <a href="#guestbook" class="nav-item nav-link">Buku Tamu</a>
                    <a href="#permohonan_informasi" class="nav-item nav-link">Permohonan</a>
                    <a href="#complaint" class="nav-item nav-link">Pengaduan</a>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary ms-3">Admin Login</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('content')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('import/assets/lib/typed/typed.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('import/assets/lib/wow/wow.min.js') }}"></script>

    <!-- Custom Javascript -->
    <script>
        // Back to top button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').addClass('active');
            } else {
                $('.back-to-top').removeClass('active');
            }
        });
        
        $('.back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        // Initialize WOW.js for animations
        new WOW().init();
        
        // Active nav item
        $('.navbar-nav .nav-link').click(function() {
            $('.navbar-nav .nav-link').removeClass('active');
            $(this).addClass('active');
        });
    </script>
    
    <!-- Template Javascript -->
    <script src="{{ asset('import/assets/js/main.js') }}"></script>
</body>
</html>
