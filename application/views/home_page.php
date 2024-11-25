<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Boehajj-Tools</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= base_url('vendor/onepage/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('vendor/onepage/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('vendor/onepage/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('vendor/onepage/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('vendor/onepage/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('vendor/onepage/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('vendor/onepage/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('vendor/onepage/') ?>assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Boehajj Tools</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url() ?>">Home<br></a></li>
                    <li><a href="#about">About</a></li>
                    <!-- <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li> -->
                    <li><a href="#team">Team</a></li>
                    <li class="dropdown"><a href="#"><span>Analysis</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="<?= site_url('newaprioricontroller') ?>">Apriori Algorithm</a></li>
                            <!-- <li class="dropdown"><a href="#"><span>Analysis</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Apriori</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li> -->
                        </ul>
                    </li>
                    <li><a href="https://www.boehajj.com/" target="_blank">Portfolio</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="#about">Get Started</a>

        </div>
    </header>

    <main class="main">
        <section id="hero" class="hero section">

            <img src="<?= base_url('vendor/onepage/') ?>assets/img/hero-bg-abstract.jpg" alt="" data-aos="fade-in"
                class="">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-out">
                    <div class="col-xl-7 col-lg-9 text-center">
                        <h1>One Page for Boehajj Analysis Tool</h1>
                        <p>Alat Analisis Untuk Kebutuhan Pemasaran Produk Brand Boehajj</p>
                    </div>
                </div>
                <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
                    <a href="#about" class="btn-get-started">Get Started</a>
                </div>

                <div class="row gy-4 mt-5 justify-content-center">
                    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-easel"></i></div>
                            <h4 class="title"><a href="">Penyusunan Etalase Live Stream</a></h4>
                            <p class="description">Rekomendasi Susunan <i>Product Campaign</i> Untuk <i>Live Stream</i>
                                di <i>Marketplace</i>
                            </p>
                        </div>
                    </div><!--End Icon Box -->

                    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-gem"></i></div>
                            <h4 class="title"><a href="">Product Bundling Plan</a></h4>
                            <p class="description">Rekomendasi Promo Terbaik Untuk Menawarkan Product Bundling dengan
                                Market Basket Analisis</p>
                        </div>
                    </div><!--End Icon Box -->

                    <!-- <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-geo-alt"></i></div>
                            <h4 class="title"><a href="">Magni Dolores</a></h4>
                            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia</p>
                        </div>
                    </div> -->
                    <!--End Icon Box -->

                    <!-- <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-command"></i></div>
                            <h4 class="title"><a href="">Nemo Enim</a></h4>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis</p>
                        </div>
                    </div> -->
                    <!--End Icon Box -->

                </div>
            </div>

        </section><!-- /Hero Section -->

    </main>

    <footer id="footer" class="footer light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Boehajj Tools</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p>United States</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">OnePage</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('vendor/onepage/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url('vendor/onepage/') ?>assets/js/main.js"></script>

</body>

</html>