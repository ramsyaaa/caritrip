@extends('traveller.layout.master')

@section('content')
<div id="siteLoader" class="site-loader">
    <div class="preloader-content">
       <img src="assets/images/loader1.gif" alt="">
    </div>
 </div>
 <div id="page" class="page">
    @include('traveller.partial.header')
    <main id="content" class="site-main">
       <section class="inner-page-wrap">
          <!-- ***Inner Banner html start form here*** -->
          <div class="inner-banner-wrap">
             <div class="inner-baner-container" style="background-image: url({{ asset('vendor/landing/assets/images/img7.jpg') }});">
                <div class="container">
                   <div class="inner-banner-content">
                      <h1 class="font-bold text-white text-[32px]">About Us</h1>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***Inner Banner html end here*** -->
          <!-- ***about section html start form here*** -->
          <div class="inner-about-wrap">
             <div class="container">
                <div class="row">
                   <div class="col-lg-8">
                      <div class="about-content">
                         <figure class="about-image">
                            <img src="{{ asset('vendor/landing/assets/images/img27.jpg') }}" alt="">
                            <div class="about-image-content">
                               <h3>WE ARE BEST FOR TOURS & TRAVEL SINCE 1985 !</h3>
                            </div>
                         </figure>
                         <h2>HOW WE ARE BEST FOR TRAVEL !</h2>
                         <p>Dictumst voluptas qui placeat omnis repellendus, est assumenda dolores facilisis, nostra, inceptos. Ullam laudantium deserunt duis platea. Fermentum diam, perspiciatis cupidatat justo quam voluptate, feugiat, quaerat. Delectus aute scelerisque blanditiis venenatis aperiam rem. Tempore porttitor orci eligendi velit vel scelerisque minus scelerisque? Dis! Aenean! Deleniti esse aperiam adipiscing, sapiente? </p>
                         <p>Ratione conubia incididunt nullam! Sodales, impedit, molestias consectetuer itaque magni ut neque, lobortis expedita corporis voluptatem natus praesent mollis quidem auctor curae, mattis laboris diamlorem iure nullam esse? Pariatur primis.</p>
                      </div>
                      <div class="client-slider white-bg">
                         <figure class="client-item">
                            <img src="{{ asset('vendor/landing/assets/images/img7.jpg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('vendor/landing/assets/images/img8.jpg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('vendor/landing/assets/images/img9.jpg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('vendor/landing/assets/images/img10.jpg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('vendor/landing/assets/images/img11.jpg') }}" alt="">
                         </figure>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div class="icon-box">
                         <div class="box-icon">
                            <i aria-hidden="true" class="fas fa-umbrella-beach"></i>
                         </div>
                         <div class="icon-box-content">
                            <h3>AFFORDABLE TOURS</h3>
                            <p>Iure doloremque saepe? Ultrices mi aliquam dis tempore incididunt sint, cumque dis temp!</p>
                         </div>
                      </div>
                      <div class="icon-box">
                         <div class="box-icon">
                            <i aria-hidden="true" class="fas fa-user-tag"></i>
                         </div>
                         <div class="icon-box-content">
                            <h3>BEST TOUR GUIDES</h3>
                            <p>Iure doloremque saepe? Ultrices mi aliquam dis tempore incididunt sint, cumque dis temp!</p>
                         </div>
                      </div>
                      <div class="icon-box">
                         <div class="box-icon">
                            <i aria-hidden="true" class="fas fa-headset"></i>
                         </div>
                         <div class="icon-box-content">
                            <h3>AFFORDABLE TOURS</h3>
                            <p>Iure doloremque saepe? Ultrices mi aliquam dis tempore incididunt sint, cumque dis temp!</p>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***about section html start form here*** -->
          <!-- ***callback section html start form here*** -->
          <div class="bg-img-fullcallback" style="background-image: url({{ asset('vendor/landing/assets/images/img7.jpg') }});">
             <div class="overlay"></div>
             <div class="container">
                <div class="row">
                   <div class="col-lg-8 offset-lg-2 text-center">
                      <div class="callback-content">
                         <div class="video-button">
                            <a id="video-container" data-fancybox="video-gallery" href="https://www.youtube.com/watch?v=2OYar8OHEOU">
                               <i class="fas fa-play"></i>
                            </a>
                         </div>
                         <h2 class="section-title">ARE YOU READY TO TRAVEL? REMEMBER US !!</h2>
                         <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p>
                         <div class="callback-btn">
                            <a href="package.html" class="round-btn">View Packages</a>
                            <a href="about.html" class="outline-btn outline-btn-white">Learn More</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***callback section html end here*** -->
       </section>
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
