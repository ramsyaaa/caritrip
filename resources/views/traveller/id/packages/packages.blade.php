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
                <div class="inner-baner-container" style="background-image: url(assets/images/img7.jpg);">
                   <div class="container">
                      <div class="inner-banner-content">
                         <h1 class="page-title">Tour Packages</h1>
                      </div>
                   </div>
                </div>
             </div>
             <!-- ***Inner Banner html end here*** -->
             <!-- ***package section html start form here*** -->
             <div class="package-item-wrap">
                <div class="container">
                    @foreach ($trips as $trip)
                    <article class="package-item">
                       <figure class="package-image" style="background-image: url({{ asset($trip->package->package_key_visual) }});"></figure>
                       <div class="package-content">
                          <h3>
                             <a href="package-detail.html">
                                {{ $trip->trip_name }}
                             </a>
                          </h3>
                          <p>{{ $trip->trip_note }}</p>
                          <div class="package-meta">
                             <ul>
                                <li>
                                   <i class="fas fa-clock"></i>
                                   {{ $trip->trip_days }} {{ $trip->trip_days > 1 ? 'days' : 'day' }}
                                </li>
                                {{-- <li>
                                   <i class="fas fa-user-friends"></i>
                                   pax: 10
                                </li> --}}
                                {{-- <li>
                                   <i class="fas fa-map-marker-alt"></i>
                                   Malaysia
                                </li> --}}
                             </ul>
                          </div>
                       </div>
                       <div class="package-price">
                          <div class="review-area">
                             <span class="review-text">Start From</span>
                             {{-- <div class="rating-start-wrap d-inline-block">
                                <div class="rating-start">
                                   <span style="width: 80%"></span>
                                </div>
                             </div> --}}
                          </div>
                          <h6 class="price-list">
                             <span>Rp{{ number_format($trip->trip_price, 0, ',', '.') }}</span>
                          </h6>
                          <a href="{{ route('packages.detail', ['id' => $trip->id]) }}" class="outline-btn outline-btn-white">Book now</a>
                       </div>
                    </article>
                    @endforeach
                </div>
             </div>
             <!-- ***package section html start form here*** -->
          </section>
       </main>
       @include('traveller.partial.footer')
    </div>
@endsection
