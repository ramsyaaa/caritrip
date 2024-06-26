@extends('traveller.layout.master', [
    'page_title' => $page_title,
    'meta_page_breadcrumbs_title' => $meta_page_breadcrumbs_title,
    'meta_page_og_image' => $meta_page_og_image,
    'meta_page_description' => $meta_page_description,
    'meta_page_keywords' => $meta_page_keywords,
])

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
                    <img class="w-full h-[500px] md:h-[400px] object-cover" src="@isset($meta_page_banner_image) @if($meta_page_banner_image != null) {{ asset($meta_page_banner_image) }} @else {{ asset('assets/images/landscape 3.jpg') }} @endif @else {{ asset('assets/images/landscape 3.jpg') }} @endisset" alt="">
                    <div class="flex items-center justify-center w-full h-full absolute top-0 left-0">
                    <h1 class="font-bold text-white text-[32px]">Tentang Kami</h1>
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
                      <div class="">
                         <figure class="relative w-full mb-4">
                            <img class="rounded-lg w-[90%]" src="{{ asset('assets/images/gambar 1.jpeg') }}" alt="">
                            <div class="absolute right-0 top-[50%] bottom-[50%]">
                               <div class=" bg-[#2C2D83] rounded-lg text-white text-[20px] px-10 py-6">
                                    Tentang Kami
                               </div>
                            </div>
                         </figure>
                         <h2 class="text-[24px] font-bold mb-4">Tahukah kamu apa itu Caritrip?</h2>
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
                         <div class="mb-4">
                            <i aria-hidden="true" class="fas fa-user-tag p-10 text-[24px] rounded-full text-white bg-[#2C2D83]"></i>
                         </div>
                         <div class="icon-box-content">
                            <h3>AFFORDABLE TOURS</h3>
                            {{-- <p>Iure doloremque saepe? Ultrices mi aliquam dis tempore incididunt sint, cumque dis temp!</p> --}}
                         </div>
                      </div>
                      <div class="icon-box">
                         <div class="mb-4">
                            <i aria-hidden="true" class="fas fa-umbrella-beach p-10 text-[24px] rounded-full text-white bg-[#2C2D83]"></i>
                         </div>
                         <div class="icon-box-content">
                            <h3>BEST TOUR GUIDES</h3>
                            {{-- <p>Iure doloremque saepe? Ultrices mi aliquam dis tempore incididunt sint, cumque dis temp!</p> --}}
                         </div>
                      </div>
                      <div class="icon-box">
                         <div class="mb-4">
                            <i aria-hidden="true" class="fas fa-headset p-10 text-[24px] rounded-full text-white bg-[#2C2D83]"></i>
                         </div>
                         <div class="icon-box-content">
                            <h3>CUSTOMER SERVICE</h3>
                            {{-- <p>Iure doloremque saepe? Ultrices mi aliquam dis tempore incididunt sint, cumque dis temp!</p> --}}
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
                                <a id="video-container" style="background-color: #2C2D83" data-fancybox="video-gallery" href="https://www.youtube.com/watch?v=2OYar8OHEOU">
                                <i class="fas fa-play"></i>
                                </a>
                            </div>
                            <h2 class="font-bold text-blue-300 text-[#2C2D83 !important] text-[24px] my-2" style="color:#2C2D83">ARE YOU READY TO TRAVEL? REMEMBER US !!</h2>
                            <p class="my-2 text-gray-400">Pesan tiket sekarang juga!</p>
                            <div class="callback-btn">
                                <a href="{{ route('packages') }}" class="round-btn bg-[#2C2D83]">View Packages</a>
                                <a href="{{ route('contact') }}" class="outline-btn outline-btn-white hover:bg-[#2C2D83]">Learn More</a>
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
