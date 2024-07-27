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
       <!-- ***home banner html start form here*** -->
       <section class="home-banner-section home-banner-slider">
          <div class="relative flex items-center">
            <img class="w-full h-[800px] md:h-[800px] object-cover" style="opacity: 150%; filter: brightness(0.6) contrast(1.2)" src="{{ asset('assets/images/landscape 1.jpg') }}" alt="">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="container">
                    <div class="banner-content text-center text-white">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h2 class="banner-title text-4xl md:text-5xl font-bold">Penuh Cerita</h2>
                                <p class="mt-4">Kami percaya bahwa setiap perjalanan & petualangan adalah sebuah rangkaian cerita dan kami berkomitmen untuk membuat cerita Anda menjadi lebih menarik dan menyenangkan.</p>
                                <div class="banner-btn mt-6">
                                {{-- <a href="about.html" class="round-btn">LEARN MORE</a> --}}
                                    <a href="booking.html" class="bg-[#2C2D83] text-white px-4 py-2 rounded">PESAN SEKARANG</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="relative flex items-center">
            <img class="w-full h-[800px] md:h-[800px] object-cover" style="opacity: 150%; filter: brightness(0.6) contrast(1.2)" src="{{ asset('assets/images/landscape 2.jpg') }}" alt="">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="container">
                    <div class="banner-content text-center text-white">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h2 class="banner-title text-4xl md:text-5xl font-bold">Perjalanan Seru</h2>
                                <p class="mt-4">Yukk buat cerita petualangan liburanmu bersama CariTrip. Kami siap membawamu berkeliling menikmati pesona alam labuan bajo yang cantik dan unik. Tunggu apa lagi, ayo pesan sekarang!!</p>
                                <div class="banner-btn mt-6">
                                {{-- <a href="about.html" class="round-btn">LEARN MORE</a> --}}
                                    <a href="booking.html" class="bg-[#2C2D83] text-white px-4 py-2 rounded">PESAN SEKARANG</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section>
       <!-- ***home banner html end here*** -->
       <!-- ***Home package html start from here*** -->
       <section class="home-package">
          <div class="container">
             <div class="row">
                <div class="col-lg-8 offset-lg-2 text-sm-center">
                   <div class="section-heading">
                      <h5 class="mt-4 font-bold text-[32px]">PERJALANAN KAPAL YANG POPULER</h5>
                      {{-- <h2 class="section-title">CHECKOUT OUR TRIP PACKAGES</h2> --}}
                      {{-- <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p> --}}
                   </div>
                </div>
             </div>
             <div class="package-section">
                    <div class="destination-item-wrap">
                        <div class="container">
                            <div class="row gx-4 gy-4">
                                @foreach ($packages as $trip)
                                <div class="col-lg-4 col-md-6 p-4">
                                    <div class="bg-white shadow-sm rounded-3xl">
                                        <article class="destination-item" style="background-image: url({{ asset($trip->package_key_visual) }});">

                                        </article>
                                        <div class="destination-content w-full px-4 pb-4">
                                            <div class="package-meta">
                                                <ul class="flex items-center gap-2">
                                                    <li style="margin-bottom: 4px">
                                                        <i style="color: #2C2D83" class="fas fa-ship"></i>
                                                        {{ $trip->trip_subcategory }}
                                                    </li>
                                                    <li style="margin-bottom: 4px">
                                                    <i style="color: #2C2D83" class="fas fa-map-marker-alt"></i>
                                                    {{ $trip->destination->name }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <h3>
                                                <a href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Boat Trip']) }}" style="font-family: 'Fredoka', sans-serif !important;">{{ $trip->package_name }}</a>
                                            </h3>
                                            <div class="">
                                                <span class="text-[16px] mt-2" style="font-family: 'Fredoka', sans-serif !important;">Mulai dari</span>
                                            </div>
                                            <h6 class="text-[24px] mt-1">
                                                <span style="font-family: 'Fredoka', sans-serif !important;">Rp @if(count($trip->openTrips) > 0) {{ number_format($trip->openTrips[0]->price, 0, ',', '.') }} {{ $trip->openTrips[0]->unit }} @elseif(count($trip->privateTrips) > 0) {{ number_format($trip->privateTrips[0]->price, 0, ',', '.') }} {{ $trip->privateTrips[0]->unit }} @elseif(count($trip->fullDayCruises) > 0) {{ number_format($trip->fullDayCruises[0]->price, 0, ',', '.') }} {{ $trip->fullDayCruises[0]->unit }} @else 0 @endif</span>
                                            </h6>
                                            <div class="w-full flex items-center justify-end">
                                                <a href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Boat Trip']) }}" class="px-3 py-2 bg-[#2C2D83] text-white rounded-lg">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>



                <div class="section-btn-wrap text-center mb-20 -mt-10">
                   <a style="background-color: #2C2D83" href="{{ route('packages', ['type' => 'Boat Trip']) }}" class="round-btn">LIHAT SEMUA</a>
                </div>
             </div>

             <div class="row">
                <div class="col-lg-8 offset-lg-2 text-sm-center">
                   <div class="section-heading">
                      <h5 class="mt-4 font-bold text-[32px]">PERJALANAN TRAVEL POPULER</h5>
                   </div>
                </div>
             </div>
             <div class="package-section">
                    <div class="destination-item-wrap">
                        <div class="container">
                            <div class="row gx-5">
                                @foreach ($travels as $trip)
                                <div class="col-lg-4 col-md-6 p-4">
                                    <div class="bg-white shadow-sm rounded-3xl">
                                        <article class="destination-item" style="background-image: url({{ asset($trip->package_key_visual) }});">

                                        </article>
                                        <div class="destination-content w-full px-4 pb-4">
                                            <span class="cat-link">
                                                <a href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Travel Trip']) }}" style="font-family: 'Fredoka', sans-serif !important;">{{ $trip->destination->name }}</a>
                                            </span>
                                            <h3>
                                                <a class="text-[20px]" href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Travel Trip']) }}" style="font-family: 'Fredoka', sans-serif !important;">{{ $trip->package_name }}</a>
                                            </h3>
                                            <div class="mt-4">
                                                <span class="text-[16px] mt-4" style="font-family: 'Fredoka', sans-serif !important;">Mulai dari</span>
                                            </div>
                                            <h6 class="text-[24px]">
                                                <span style="font-family: 'Fredoka', sans-serif !important;">Rp @if(count($trip->openTrips) > 0) {{ number_format($trip->openTrips[0]->price, 0, ',', '.') }} {{ $trip->openTrips[0]->unit }} @elseif(count($trip->privateTrips) > 0) {{ number_format($trip->privateTrips[0]->price, 0, ',', '.') }} {{ $trip->privateTrips[0]->unit }} @else 0 @endif </span>
                                            </h6>
                                            <div class="w-full flex items-center justify-end">
                                                <a href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Travel Trip']) }}" class="px-3 py-2 bg-[#2C2D83] text-white rounded-lg">
                                                    Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>



                <div class="section-btn-wrap text-center -mt-10">
                   <a style="background-color: #2C2D83" href="{{ route('packages', ['type' => 'Travel Trip']) }}" class="round-btn">LIHAT SEMUA</a>
                </div>
             </div>
          </div>
       </section>
       <!-- ***Home package html end here*** -->
       <!-- ***Home blog html start from here*** -->
       <section class="home-blog">
          <div class="container">
             <div class="section-heading d-sm-flex align-items-center justify-content-between">
                <div class="heading-group">
                   <h5 style="color: #2C2D83" class="font-bold text-[32px] mb-4">BLOG TERBARU</h5>
                   <h2 class="section-title">POSTINGAN TERBARU KAMI</h2>
                   {{-- <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. <br>Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p> --}}
                </div>
                <div class="heading-btn">
                   <a style="background-color: #2C2D83" href="{{ route('blogs.index') }}" class="round-btn">LIHAT SEMUA</a>
                </div>
             </div>
             <div class="blog-section">
                <div class="row gx-4">
                    @foreach ($blogs as $blog)
                   <div class="col-lg-6">
                      <article class="post">
                         <figure class="featured-post" style="background-image: url({{ asset($blog->featured_image) }});"></figure>
                         <div class="post-content">
                            <div class="cat-meta">
                               <a style="color: #2C2D83">{{ $blog->category ? $blog->category->category_name : '' }}</a>
                            </div>
                            <h3><a class="font-bold text-[16px]" href="{{ route('blogs.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                            <p class="line-clamp-2">{{ strip_tags($blog->content) }}</p>
                            <div class="post-footer d-flex justify-content-between align-items-center">
                               <div class="post-btn">
                                  <a style="background-color: #2C2D83" href="{{ route('blogs.show', ['slug' => $blog->slug]) }}" class="round-btn">Read more</a>
                               </div>
                            </div>
                         </div>
                      </article>
                   </div>
                   @endforeach
                </div>
             </div>
          </div>
       </section>
       <!-- ***Home blog html end here*** -->
       <!-- ***Home callback html end here*** -->
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
