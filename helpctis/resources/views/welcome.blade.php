<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HELP CTIS - Covid Test Information System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('helpctis/dist/img/hospital2.png') }}" rel="icon">
    <link href="{{ asset('helpctis/dist/img/hospital2.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('index/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('index/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{url('index/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">helpsctis@cshelp.com</a>
            <i class="icofont-phone"></i> +62 361 230500
        </div>
        <div class="social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="index.html">HELP CTIS</a></h1>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        @if (Route::has('login'))
            @auth
                <a href="{{ route('login') }}" class="appointment-btn scrollto">Home</a>
            @else
                <a href="{{ route('login') }}" class="appointment-btn scrollto">Sign In</a>
            @endauth
        @endif

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <h1>HELP CTIS for The Future</h1>
        <h2>We Belive Everyone Should Have Easy Access To Great Covid Test</h2>
        @if (Route::has('login'))
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Get Started</a>
        @endif
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="row">
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">

                </div>

                <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3>HELP COVID-19 Testing Information System (CTIS)</h3>
                    <p>This w is initiated to develop a website information system to administer tests and keep track of the test result of COVID-19 patients under the name of HELP Covid-19 Testing Information System (CTIS) Website.</p>
                    <p>HELP CTIS website is developed in hope to aid the health ministry by replacing the outdated and not thoroughly secured system that is used by the hospital and medical centre across the country.</p>
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-devices"></i></div>
                        <h4 class="title"><a href="">Responsive</a></h4>
                        <p class="description">This website is responsive, so users can use this website on various computer electronic devices such as PCs, Laptops and Smartphones</p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bxs-magic-wand"></i></div>
                        <h4 class="title"><a href="">User-friendly</a></h4>
                        <p class="description">Users can easily adapt when using this website because of the readable content, fast load time, easy to use form and many others</p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-check-shield"></i></div>
                        <h4 class="title"><a href="">Privacy</a></h4>
                        <p class="description">All data on the results of the Covid Test can only be accessed by the user and The Officer (Tester) who carried out the Covid Test on that user</p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">

            <div class="row">
                @php
                    $tester = DB::table('users')->where('position', 'tester')->count();
                    $test_centre = DB::table('test_centres')->count();
                    $covid_test = DB::table('covid_tests')->count();
                    $patient = DB::table('users')->where('position', 'patient')->count();
                @endphp
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                        <i class="icofont-doctor-alt"></i>
                        <span data-toggle="counter-up">{{ $tester }}</span>
                        <p>Tester</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="icofont-patient-bed"></i>
                        <span data-toggle="counter-up">{{ $test_centre }}</span>
                        <p>Hospitals</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="icofont-laboratory"></i>
                        <span data-toggle="counter-up">{{ $covid_test }}</span>
                        <p>Covid Tests</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                        <i class="icofont-users-alt-2"></i>
                        <span data-toggle="counter-up">{{ $patient }}</span>
                        <p>Patients</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="owl-carousel testimonials-carousel">

                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                        <img src="{{url('/index/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                        <h3>Cindy Karina</h3>
                        <h4>Students</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Wow...!!! This website really helped me
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                        <img src="{{url('/index/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                        <h3>Dian Sinto</h3>
                        <h4>Designer</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            The appearance of this website is simple and attractive to look at
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                        <img src="{{url('/index/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                        <h3>David Ruth</h3>
                        <h4>Teacher</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            This website makes it easy for me to check my covid test results online
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                        <img src="{{url('/index/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                        <h3>Regina Salim</h3>
                        <h4>Accountant</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            The features are very diverse and I can also print my test results easily
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

                <div class="testimonial-wrap">
                    <div class="testimonial-item">
                        <img src="{{url('/index/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                        <h3>Demian Farid</h3>
                        <h4>Athlete</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            For me who always uses a smartphone, this website is very helpful
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Copyright <strong><span>HELP CTIS</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{url('index/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('index/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('index/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{url('index/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{url('index/assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{url('index/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{url('index/assets/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{url('index/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{url('index/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('index/assets/js/main.js')}}"></script>

</body>

</html>
