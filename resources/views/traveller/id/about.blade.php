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
            <div class="">
                <div class="relative w-full">
                    <img class="w-full h-[500px] md:h-[400px] object-cover" src="{{ asset('assets/images/landscape 3.jpg') }}" alt="">
                    <div class="flex items-center justify-center w-full h-full absolute top-0 left-0">
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
                            <img  src="{{ asset('assets/images/gambar 1.jpeg') }}" alt="">
                            <div class="about-image-content">
                               <h3>Tentang Kami</h3>
                            </div>
                         </figure>
                         <h2>Tahukah kamu apa itu Caritrip?</h2>
                         <p>CariTrip adalah tour operator wisata yang hadir untuk kamu yang masih bimbang & bingung dalam merencanakan liburan terbaik dengan cita rasa petualangan tak terbatas. Kami menyediakan aneka paket wisata open trip dan private trip, yang turut menjamin mutu liburan kamu. Harga tiap paket wisata bervariasi, dan bisa disesuaikan dengan budget liburan kamu. Tentunya harga paket wisata yg kami tawarkan sesuai dengan kualitas pelayanan yang kami berikan. Informasi biaya setiap paket wisata dijelaskan sedetail mungkin di dalam platform ini dan akan diperjelas lagi via whatsapp agar kamu tidak lagi bingung dan bimbang dalam merencanakan liburanmu.</p>
                    </div>
                      <div class="client-slider white-bg">
                         <figure class="client-item">
                            <img src="{{ asset('assets/images/gambar 2.jpeg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('assets/images/gambar 3.jpeg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('assets/images/gambar 4.jpeg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('assets/images/gambar 5.jpeg') }}" alt="">
                         </figure>
                         <figure class="client-item">
                            <img src="{{ asset('assets/images/gambar 6.jpeg') }}" alt="">
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
          <div class="relative">
            <img src="{{ asset('assets/images/landscape 4.jpg') }}" alt="">
            <div class="flex items-center justify-center w-full h-full absolute top-0 left-0">
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
                            <h2 class="font-bold text-blue-300 text-[24px] my-2">ARE YOU READY TO TRAVEL? REMEMBER US !!</h2>
                            <p class="my-2 text-gray-400">Pesan tiket sekarang juga!</p>
                            <div class="callback-btn">
                                <a href="{{ route('packages') }}" class="round-btn">View Packages</a>
                                <a href="{{ route('contact') }}" class="outline-btn outline-btn-white">Learn More</a>
                            </div>
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
