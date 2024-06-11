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
                         <h1 class="font-bold text-[32px] text-white">Tour Packages @if($category) ({{ $category }}) @endif</h1>
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
                          <a href="{{ route('packages.detail', ['id' => $trip->id, 'category' => $category]) }}"
                            style="border-radius: 20px; border: 2px solid white; font-size: 16px; padding: 10px 20px; color: white; display: inline-block; text-align: center;"
                            onMouseOver="this.style.backgroundColor='#F6B334'; this.style.color='white';"
                            onMouseOut="this.style.backgroundColor='transparent'; this.style.color='white';">
                            Detail
                         </a>
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