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
       <!-- ***home banner html start form here*** -->
       <section class="home-banner-section home-banner-slider">
          <div class="relative flex items-center">
            <img class="w-full h-[800px] md:h-[800px] object-cover" src="{{ asset('assets/images/landscape 1.jpg') }}" alt="">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="container">
                    <div class="banner-content text-center text-white">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h2 class="banner-title text-4xl md:text-5xl font-bold">CariTrip</h2>
                                <p class="mt-4">Kami percaya bahwa setiap perjalanan & petualangan adalah sebuah rangkaian cerita dan kami berkomitmen untuk membuat cerita Anda menjadi lebih menarik dan menyenangkan.</p>
                                <div class="banner-btn mt-6">
                                {{-- <a href="about.html" class="round-btn">LEARN MORE</a> --}}
                                    <a href="booking.html" class="bg-[#2C2D83] text-white font-bold px-4 py-2 rounded">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="relative flex items-center">
            <img class="w-full h-[800px] md:h-[800px] object-cover" src="{{ asset('assets/images/landscape 2.jpg') }}" alt="">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="container">
                    <div class="banner-content text-center text-white">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <h2 class="banner-title text-4xl md:text-5xl font-bold">Perjalanan Seru</h2>
                                <p class="mt-4">Yukk buat cerita petualangan liburanmu bersama CariTrip. Kami siap membawamu berkeliling menikmati pesona alam labuan bajo yang cantik dan unik. Tunggu apa lagi, ayo pesan sekarang!!</p>
                                <div class="banner-btn mt-6">
                                {{-- <a href="about.html" class="round-btn">LEARN MORE</a> --}}
                                    <a href="booking.html" class="bg-[#2C2D83] text-white font-bold px-4 py-2 rounded">BOOK NOW</a>
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
                      <h5 class="mt-4 font-bold text-[32px]">POPULAR TRIP PACKAGES</h5>
                      {{-- <h2 class="section-title">CHECKOUT OUR TRIP PACKAGES</h2> --}}
                      {{-- <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p> --}}
                   </div>
                </div>
             </div>
             <div class="package-section">
                @foreach ($packages as $trip)
                    <article class="package-item">
                       <figure class="package-image" style="background-image: url({{ asset($trip->package_key_visual) }});"></figure>
                       <div class="package-content">
                          <h3>
                             <div class="font-bold text-[24px]">
                                {{ $trip->package_name }}
                             </div>
                          </h3>
                          <p>{!! $trip->trip_note !!}</p>
                          <div class="package-meta">
                            <ul>
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
                       </div>
                       <div style="background-color: #2C2D83" class="package-price">
                          <div class="review-area">
                             <span class="review-text">Start From</span>
                             {{-- <div class="rating-start-wrap d-inline-block">
                                <div class="rating-start">
                                   <span style="width: 80%"></span>
                                </div>
                             </div> --}}
                          </div>
                          <h6 class="price-list">
                             <span>Rp @if(count($trip->openTrips) > 0) {{ number_format($trip->openTrips[0]->price, 0, ',', '.') }} @elseif(count($trip->privateTrips) > 0) {{ number_format($trip->privateTrips[0]->price, 0, ',', '.') }} @elseif(count($trip->fullDayCruises) > 0) {{ number_format($trip->fullDayCruises[0]->price, 0, ',', '.') }} @else 0 @endif </span>
                          </h6>
                          <a href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Boat Trip']) }}"
                            style="border-radius: 20px; border: 2px solid white; font-size: 16px; padding: 10px 20px; color: white; display: inline-block; text-align: center;"
                            onMouseOver="this.style.backgroundColor='#F6B334'; this.style.color='white';"
                            onMouseOut="this.style.backgroundColor='transparent'; this.style.color='white';">
                            Detail
                         </a>
                       </div>
                    </article>
                    @endforeach
                <div class="section-btn-wrap text-center">
                   <a style="background-color: #2C2D83" href="{{ route('packages', ['type' => 'Boat Trip']) }}" class="round-btn">VIEW ALL PACKAGES</a>
                </div>
             </div>

             <div class="row">
                <div class="col-lg-8 offset-lg-2 text-sm-center">
                   <div class="section-heading">
                      <h5 class="mt-4 font-bold text-[32px]">POPULAR TRAVEL PACKAGES</h5>
                      {{-- <h2 class="section-title">CHECKOUT OUR TRIP PACKAGES</h2> --}}
                      {{-- <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p> --}}
                   </div>
                </div>
             </div>
             <div class="package-section">
                @foreach ($travels as $trip)
                    <article class="package-item">
                       <figure class="package-image" style="background-image: url({{ asset($trip->package_key_visual) }});"></figure>
                       <div class="package-content">
                          <h3>
                             <div class="font-bold text-[24px]">
                                {{ $trip->package_name }}
                             </div>
                          </h3>
                          <p>{!! $trip->trip_note !!}</p>
                          <div class="package-meta">
                            <ul>
                                <li style="margin-bottom: 4px">
                                   <i style="color: #2C2D83" class="fas fa-map-marker-alt"></i>
                                   {{ $trip->destination->name }}
                                </li>
                             </ul>
                          </div>
                       </div>
                       <div style="background-color: #2C2D83" class="package-price">
                          <div class="review-area">
                             <span class="review-text">Start From</span>
                             {{-- <div class="rating-start-wrap d-inline-block">
                                <div class="rating-start">
                                   <span style="width: 80%"></span>
                                </div>
                             </div> --}}
                          </div>
                          <h6 class="price-list">
                             <span>Rp @if(count($trip->openTrips) > 0) {{ number_format($trip->openTrips[0]->price, 0, ',', '.') }} @elseif(count($trip->privateTrips) > 0) {{ number_format($trip->privateTrips[0]->price, 0, ',', '.') }} @else 0 @endif </span>
                          </h6>
                          <a href="{{ route('packages.detail', ['id' => $trip->id, 'type' => 'Travel Trip']) }}"
                            style="border-radius: 20px; border: 2px solid white; font-size: 16px; padding: 10px 20px; color: white; display: inline-block; text-align: center;"
                            onMouseOver="this.style.backgroundColor='#F6B334'; this.style.color='white';"
                            onMouseOut="this.style.backgroundColor='transparent'; this.style.color='white';">
                            Detail
                         </a>
                       </div>
                    </article>
                    @endforeach
                <div class="section-btn-wrap text-center">
                   <a style="background-color: #2C2D83" href="{{ route('packages', ['type' => 'Travel Trip']) }}" class="round-btn">VIEW ALL PACKAGES</a>
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
                   <h5 style="color: #2C2D83" class="font-bold text-[32px] mb-4">LATEST BLOG</h5>
                   <h2 class="section-title">OUR RECENT POSTS</h2>
                   {{-- <p>Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. <br>Vestibulum cumque laudantium. Sit ornare mollitia tenetur, aptent.</p> --}}
                </div>
                <div class="heading-btn">
                   <a style="background-color: #2C2D83" href="{{ route('blogs.index') }}" class="round-btn">View All Blog</a>
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
                            <h3><a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                            {{-- <p>Laboris hac erat dolor, posuere volutpat fringilla gravida metus nonummy, blandit mi...</p> --}}
                            <div class="post-footer d-flex justify-content-between align-items-center">
                               <div class="post-btn">
                                  <a style="background-color: #2C2D83" href="{{ route('blogs.show', ['slug' => $blog->slug]) }}" class="round-btn">Read More</a>
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
