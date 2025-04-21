
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EDUCAPAIAN</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>EDUCAPAIN</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="#home-section" class="nav-item nav-link">Beranda</a>
                <a href="#profile-section" class="nav-item nav-link">Profile</a>
                <a href="#galeri-section" class="nav-item nav-link">Galeri</a>
                <a href="#info-section" class="nav-item nav-link">Tentang Kami</a>
                <div class="nav-item dropdown">
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
            </div>
            <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" onclick="redirectToLogin()">Login <i class="fa fa-arrow-right ms-3"></i></a>
            </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                            <section id="home-section" class="flex flex-col items-center text-center px-10 py-16 bg-blue-200">
                                <h1 class="display-3 text-white animated slideInDown">Wujudkan Prestasi, Capai Masa Depan</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Di SMK Informatika Utama, setiap langkah kecil menuju ilmu adalah bagian dari pencapaian besar. Dengan EDUCAPAIAN, pantau perkembangan siswa dan guru secara real-time, dorong semangat belajar, dan raih prestasi terbaik!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown">Prestasi Nyata, Masa Depan Cerah</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Di SMK Informatika Utama, setiap usaha adalah langkah menuju keberhasilan. Dengan EDUCAPAIAN, rekam dan pantau perkembangan siswa serta guru secara real-time, wujudkan pembelajaran yang lebih efektif, dan dorong semangat meraih prestasi!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


   

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
                        <section id="profile-section" class="flex flex-col items-center text-center px-10 py-16 bg-blue-200">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp scrollable-section" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Profile</h6>
                    <h1 class="mb-4">Selamat Datang Educapaian</h1>
                    <p class="mb-4">SMK Informatika Utama adalah lembaga pendidikan kejuruan yang berfokus pada teknologi dan informatika, berkomitmen untuk mencetak lulusan yang kompeten dan siap bersaing di dunia industri maupun akademik. Melalui program EduCapain, sekolah ini terus mendorong pencapaian terbaik bagi siswa dan guru dalam berbagai bidang.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kompetisi Keahlian</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Karya Inovatif</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Sertifikasi & Magang Industri</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Penghargaan & Kompetisi</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Penelitian & Publikasi</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Kontribusi & Pelatihan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <section id="galeri-section" class="flex flex-col items-center text-center px-10 py-16 bg-blue-200">
                <h6 class="section-title bg-white text-center text-primary px-3">Kategori</h6>
                <h1 class="mb-5">Kategori Jurusan</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Teknik Jaringan Komputer</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Desain Grafis</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Rekayasa Perangkat Lunak</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Marketing</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->

  <!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
    <section id="info-section" class="flex flex-col items-center text-center px-10 py-16 bg-blue-200">
        <!-- Judul Utama -->
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h3 class="text-white text-uppercase fw-bold">Tentang Kami & Kebijakan Privasi</h3>
            </div>
        </div>
        <div class="row g-10 d-flex justify-content-center text-center">
            <div class="col-lg-5 col-md-7">
                <h4 class="text-white mb-3 text-uppercase">Kontak</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya PLN GANDUL, CINERE</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0856 721 3830</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>nimahlizzhra@gmail.com</p>
            </div>
            <div class="col-lg-5 col-md-7">
                <h4 class="text-white mb-3 text-uppercase">Hak Cipta</h4>
                <p>&copy; <a class="border-bottom text-white" href="#">Nama Situs Anda</a>. Semua Hak Dilindungi Undang-undang.</p>
                <p>Didistribusikan Oleh <a class="border-bottom text-white" href="https://themewagon.com">SMK Informatika Utama</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
    function redirectToLogin() {
        // Contoh: Ambil role pengguna dari localStorage atau sessionStorage
        let userRole = localStorage.getItem("userRole"); // "siswa", "guru", "kepala_sekolah"

        if (userRole === "siswa") {
            window.location.href = "/login-siswa";
        } else if (userRole === "guru") {
            window.location.href = "/login-guru";
        } else if (userRole === "kepala_sekolah") {
            window.location.href = "/login-kepala-sekolah";
        } else {
            window.location.href = "/login"; // Default login page
        }
    }
</script>
</body>

</html>