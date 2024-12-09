@extends('frontend.layouts')


@section('main')
<section id="hero" class="hero section accent-background">

<div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
  <div class="row gy-5 justify-content-between">
    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
      <h2><span>مرحبًا بكم في </span><span class="accent">{{ $homepage->title ?? 'إديوفيرتيكس' }}</span></h2>
      <p>{{ $homepage->description }}</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started">ابدأ الآن</a>
        @if(!empty($homepage->video_url))
          <a href="{{ $homepage->video_url }}" class="glightbox btn-watch-video d-flex align-items-center">
            <i class="bi bi-play-circle"></i><span>مشاهدة الفيديو</span>
          </a>
        @endif
      </div>
    </div>
    <div class="col-lg-5 order-1 order-lg-2">
      <img src="{{ asset('storage/' . $homepage->image) }}" class="img-fluid" alt="{{ $homepage->title }}">
    </div>
  </div>
</div>

<div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
  <div class="container position-relative">
    <div class="row gy-4 mt-5">
      @foreach($categories as $category)
      <div class="col-xl-3 col-md-6">
        <div class="icon-box">
        <div class="icon"><i class="{{ $category->icon ?? 'bi bi-question-circle' }}"></i></div>
          <h4 class="title">
            <a href="" class="stretched-link">{{ $category->title }}</a> <!-- Dynamic Title -->
          </h4>
      
        </div>
      </div><!--End Icon Box -->
      @endforeach
    </div>
  </div>
</div>


</section><!-- /Hero Section -->


<!-- About Section -->
<section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>{{$aboutUs->title}}<br></h2>
  <p>
      {{$aboutUs->description }}
  </p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <h3>{{$aboutUs->title_2}}</h3>
      <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="حولنا">
      <p>يمكنك الاعتماد علينا لتقديم أفضل الخدمات المضمونة والتي تناسب احتياجاتك.</p>
      <p>نحن ملتزمون بتوفير الحلول المبتكرة التي توفر الراحة والجودة لجميع عملائنا.</p>
    </div>
    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
      <div class="content ps-0 ps-lg-5">
        <p class="fst-italic">
          نحن ملتزمون بتقديم حلول مبتكرة بجودة عالية تناسب متطلبات العملاء.
        </p>
        <ul>
          <li><i class="bi bi-check-circle-fill"></i> <span>نضمن تقديم خدمات عالية الجودة ومتميزة.</span></li>
          <li><i class="bi bi-check-circle-fill"></i> <span>العمل بشفافية واحترافية في جميع المراحل.</span></li>
          <li><i class="bi bi-check-circle-fill"></i> <span>التأكد من رضا العملاء وتلبية احتياجاتهم بأفضل الطرق الممكنة.</span></li>
        </ul>
        <p>
          نقدم خدماتنا بأعلى معايير الجودة لضمان رضا العملاء وتحقيق النجاح المشترك.
        </p>

        <div class="position-relative mt-4">
          <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="حول">
          <a href="{{$aboutUs->video_1}}" class="glightbox pulsating-play-btn"></a>
        </div>
      </div>
    </div>
  </div>

</div>

</section>

<!-- Clients Section -->
<section id="clients" class="clients section">

<div class="container">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 2,
            "spaceBetween": 40
          },
          "480": {
            "slidesPerView": 3,
            "spaceBetween": 60
          },
          "640": {
            "slidesPerView": 4,
            "spaceBetween": 80
          },
          "992": {
            "slidesPerView": 6,
            "spaceBetween": 120
          }
        }
      }
    </script>
    <div class="swiper-wrapper align-items-center">
      <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt="عميل 1"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt="عميل 2"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt="عميل 3"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt="عميل 4"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt="عميل 5"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt="عميل 6"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt="عميل 7"></div>
      <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt="عميل 8"></div>
    </div>
  </div>

</div>

</section><!-- /Clients Section -->

<!-- Stats Section -->
<section id="stats" class="stats section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 align-items-center">
      
      <div class="col-lg-5">
        <img src="assets/img/stats-img.svg" alt="الإحصائيات" class="img-fluid">
      </div>

      <div class="col-lg-7">
        <div class="row gy-4">
          @foreach ($stats as $stat)
          <div class="col-lg-6">
            <div class="stats-item d-flex">
              <i class="bi bi-emoji-smile flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $aboutUs->numbers	 }}" data-purecounter-duration="1" class="purecounter"></span>
                <p> <span>{{ $aboutUs->desc_1 }}</span></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>



<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section dark-background">

<div class="container">
  <img src="assets/img/cta-bg.jpg" alt="خلفية">
  <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
    <div class="col-xl-10">
      <div class="text-center">
        <a href="{{$aboutUs->video_2}}" class="glightbox play-btn"></a>
        <h3>{{$aboutUs->title_2	}}</h3>
        <p>{{$aboutUs->desc_2}}</p>
        <a class="cta-btn" href="#">ابدأ الآن</a>
      </div>
    </div>
  </div>
</div>

</section><!-- /Call To Action Section -->

<!-- Services Section -->
<section id="services" class="services section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>{{ $service->title }}</h2>
  <p>{{ $service->description }}</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    @foreach ($courses as $course)
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 + 100 }}">
        <div class="service-item position-relative">
          <div class="icon">
            <i class="{{ $course->icon_1 }}"></i> <!-- Display icon -->
          </div>
          <h3>{{ $course->title_1 }}</h3> <!-- Display title -->
          <p>{{ $course->desc_1 }}</p> <!-- Display description -->
          <a href="service-details.html" class="readmore stretched-link">اقرأ المزيد <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    @endforeach

  </div>

</div>

</section><!-- /Services Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
@foreach ($opinions as $opinion)
  <h2>{{ $opinion->title }}</h2>
  <p>{{ $opinion->description }}</p>
@endforeach

</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
      {
        "loop": true,
        "speed": 600,
        "autoplay": {
          "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
          "el": ".swiper-pagination",
          "type": "bullets",
          "clickable": true
        },
        "breakpoints": {
          "320": {
            "slidesPerView": 1,
            "spaceBetween": 40
          },
          "1200": {
            "slidesPerView": 3,
            "spaceBetween": 10
          }
        }
      }
    </script>
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        @foreach($opinions as $opinion)
        <div class="testimonial-item">
          <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="شهادة عميل">
          <h3>{{$opinion->name}}</h3>
          <h4>{{$opinion->job_title}}</h4>
          <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p>
            <i class="bi bi-quote quote-icon-left"></i>
            <span>{{$opinion->opinion}}</span>
            <i class="bi bi-quote quote-icon-right"></i>
          </p>
        </div>
      </div><!-- End testimonial item -->
      @endforeach

      <!-- Repeat similar for other testimonials -->

    </div>

  </div>

</div>

</section><!-- /Testimonials Section -->


<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>{{ $event->title }}</h2>
  <p>{{ $event->description }}</p>
</div>
<!-- End Section Title -->

<div class="container">

  <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
      <li data-filter="*" class="filter-active">الكل</li>
      <li data-filter=".filter-app">تطبيقات</li>
      <li data-filter=".filter-product">منتجات</li>
      <li data-filter=".filter-branding">العلامات التجارية</li>
      <li data-filter=".filter-books">الكتب</li>
    </ul><!-- End Portfolio Filters -->

    <div class="row gy-4 isotope-container align-right" data-aos="fade-up" data-aos-delay="200">
      
  <!-- Portfolio Items -->
  @foreach($applications as $application)
  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
    <div class="portfolio-content h-100">
      <a href="assets/img/portfolio/app-1.jpg" data-gallery="portfolio-gallery-app" class="glightbox">
        <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="{{ $application->title }}">
      </a>
      <div class="portfolio-info">
        <h4><a href="portfolio-details.html" title="تفاصيل أكثر">{{ $application->title }}</a></h4>
        <p>{{ $application->description }}</p>
      </div>
    </div>
  </div><!-- End Portfolio Item -->
  @endforeach
</div><!-- End Portfolio Container -->




</section><!-- /Portfolio Section -->

<!-- Team Section -->
<section id="team" class="team section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>فريقنا</h2>
    <p>فريق من المحترفين يعملون لتحقيق النجاح لك ولشركتك.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <!-- Loop Through Team Members -->
      @foreach($teamMembers as $member)
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <img src="{{ asset('storage/' . $member->image) }}" class="img-fluid" alt="{{ $member->title }}">
          <h4>{{ $member->title }}</h4>
          <span>{{ $member->job_title }}</span>
          <div class="social">
            @if($member->twitter)
              <a href="{{ $member->twitter }}"><i class="bi bi-twitter"></i></a>
            @endif
            @if($member->facebook)
              <a href="{{ $member->facebook }}"><i class="bi bi-facebook"></i></a>
            @endif
            @if($member->instagram)
              <a href="{{ $member->instagram }}"><i class="bi bi-instagram"></i></a>
            @endif
            @if($member->linkedin)
              <a href="{{ $member->linkedin }}"><i class="bi bi-linkedin"></i></a>
            @endif
          </div>
        </div>
      </div><!-- End Team Member -->
      @endforeach

    </div>
  </div>
</section><!-- /Team Section -->


<!-- Faq Section -->
<section id="faq" class="faq section">

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
      <div class="content px-xl-5">
        <h3><span>الأسئلة </span><strong>الشائعة</strong></h3>
        <p>
          هنا تجد الإجابات عن أكثر الأسئلة شيوعًا التي قد تدور في ذهنك حول خدماتنا وكيفية استفادتك منها.
        </p>
      </div>
    </div>

    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

      <div class="faq-container">
        <div class="faq-item faq-active">
          <h3><span class="num">1.</span> <span>ما هي الإجراءات المتبعة لطلب الخدمة؟</span></h3>
          <div class="faq-content">
            <p>نحن نسهل عليك الخطوات من خلال عملية بسيطة تبدأ بالتسجيل، ثم تحديد احتياجاتك، ومن ثم تقديم الحلول المناسبة لك.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3><span class="num">2.</span> <span>هل يمكنني تعديل الطلب بعد تقديمه؟</span></h3>
          <div class="faq-content">
            <p>بالطبع، يمكنك التعديل على الطلب خلال وقت معين من تقديمه. فريقنا مستعد لتلبية جميع التغييرات المطلوبة.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3><span class="num">3.</span> <span>ما هي طرق الدفع المتاحة؟</span></h3>
          <div class="faq-content">
            <p>نوفر عدة طرق للدفع مثل التحويل البنكي، الدفع الإلكتروني، أو الدفع عند الاستلام لضمان راحتك.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3><span class="num">4.</span> <span>هل تتوفر خدمات دعم العملاء؟</span></h3>
          <div class="faq-content">
            <p>نعم، فريق دعم العملاء متاح يوميًا من الساعة 11 صباحًا حتى 11 مساءً للإجابة على جميع استفساراتك.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

        <div class="faq-item">
          <h3><span class="num">5.</span> <span>كيف يمكنني متابعة حالة الطلب؟</span></h3>
          <div class="faq-content">
            <p>نوفر نظام تتبع مباشر يتيح لك الاطلاع على حالة الطلب خطوة بخطوة بكل سهولة.</p>
          </div>
          <i class="faq-toggle bi bi-chevron-right"></i>
        </div><!-- End Faq item-->

      </div>

    </div>
  </div>

</div>

</section><!-- /Faq Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>تواصل معنا</h2>
  <p>نحن هنا للإجابة على أسئلتك ومساعدتك في الحصول على أفضل تجربة ممكنة.</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gx-lg-0 gy-4">

    <div class="col-lg-4">
      <div class="info-container d-flex flex-column align-items-center justify-content-center">
        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>العنوان</h3>
            <p>شارع آدم 108، نيويورك، الولايات المتحدة</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>اتصل بنا</h3>
            <p>+201207807796</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>راسلنا</h3>
            <p>info@eduvertexacademy.com</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
          <i class="bi bi-clock flex-shrink-0"></i>
          <div>
            <h3>ساعات العمل:</h3>
            <p>الاثنين-السبت: 11 صباحًا - 11 مساءً</p>
          </div>
        </div><!-- End Info Item -->

      </div>

    </div>

    <div class="col-lg-8">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('contact.store') }}" method="post">
        @csrf
        <div class="row gy-4">
          <div class="col-md-6">
            <input type="text" name="fullname" class="form-control" placeholder="الاسم الكامل" required>
          </div>
          <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
          </div>
          <div class="col-md-12">
            <input type="text" name="topic" class="form-control" placeholder="الموضوع" required>
          </div>
          <div class="col-md-12">
            <textarea name="message" class="form-control" rows="8" placeholder="الرسالة" required></textarea>
          </div>
          <div class="col-md-12 text-center">
            <button type="submit">إرسال</button>
          </div>
        </div>
      </form>

    </div><!-- End Contact Form -->

  </div>

</div>

</section><!-- /Contact Section -->

@endsection