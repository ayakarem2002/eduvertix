<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>الموقع الخاص بشركه EDUVERTIX</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@eduvertexacademy.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+201207807796</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img style="width: 150px;" src="assets/img/logo.png" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="#hero" class="active">الرئيسية<br></a></li>
            <li><a href="#about">من نحن</a></li>
            <li><a href="#services">خدماتنا</a></li>
            <li><a href="#portfolio">قالو عنا</a></li>
            <li><a href="#team">فعاليتنا</a></li>
            <li><a href="blog.html">منصه التدريب</a></li>
            <li><a href="#contact">تواصل معنا</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">


  @yield('main')


  </main>


  <footer id="footer" class="footer accent-background">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-about">
      <a href="index.html" class="logo d-flex align-items-center">
        <img style="width: 150px;" src="{{ asset('assets/img/logo.png') }}" alt="">
      </a>
      <p>شركة تربوية تدريبية استشارية تعليمية قيمية استثمارية شاملة المنهج والبرنامج،
        تهتم بالنشء في الوطن العربي والعالم الإسلامي، وتعمل مع المؤسسات التعليمية والتربوية،
        وتسهم في بناء أجيال تتمتع بشخصيات متوازنة مرتكزة على بناء قيمي قوي، ومهارات حياتية متنوعة.</p>
      <div class="social-links d-flex mt-4">
        <a href="#"><i class="bi bi-twitter-x"></i></a>
        <a href="#"><i class="bi bi-facebook"></i></a>
        <a href="#"><i class="bi bi-instagram"></i></a>
        <a href="#"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>روابط مفيدة</h4>
      <ul>
        <li><a href="#">الرئيسية</a></li>
        <li><a href="#">من نحن</a></li>
        <li><a href="#">الخدمات</a></li>
        <li><a href="#">شروط الخدمة</a></li>
        <li><a href="#">سياسة الخصوصية</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>خدماتنا</h4>
      <ul>
        <li><a href="#">مكارم</a></li>
        <li><a href="#">شمائل</a></li>
        <li><a href="#">رواد</a></li>
        <li><a href="#">رسومات مكارم</a></li>
        <li><a href="#">التدريب القيمي والتأهيل التربوي</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
      <h4>تواصل معنا</h4>
      <p>شارع آدم 108</p>
      <p>نيويورك، NY 535022</p>
      <p>الولايات المتحدة</p>
      <p class="mt-4"><strong>الهاتف:</strong> <span>+1 5589 55488 55</span></p>
      <p><strong>البريد الإلكتروني:</strong> <span>info@example.com</span></p>
    </div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>حقوق النشر</span> <strong class="px-1 sitename">EduVertix</strong> <span>جميع الحقوق محفوظة</span></p>
</div>

</footer>


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>


<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>