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
       <section class="package-inner-page">
          <!-- ***Inner Banner html start form here*** -->
          <div class="inner-banner-wrap">
             <div class="inner-baner-container" style="background-image: url({{ asset($package->package->package_key_visual) }});">
                <div class="container">
                   <div class="inner-banner-content">
                      <h1 class="page-title">{{ $package->trip_name }}</h1>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***Inner Banner html end here*** -->
          <!-- ***career section html start form here*** -->
          <div class="inner-package-detail-wrap">
             <div class="container">
                <div class="row">
                   <div class="col-lg-8 primary right-sidebar">
                      <div class="single-packge-wrap">
                         <div style="display: flex; justify-content:space-between;width:100% !important" class="single-package-head d-flex align-items-center">
                            <div class="package-title">
                               <h2>{{ $package->package->package_name }}</h2>
                               {{-- <div class="rating-start-wrap">
                                  <div class="rating-start">
                                     <span style="width: 80%"></span>
                                  </div>
                               </div> --}}
                            </div>
                            <div class="package-price">
                               <h6 class="price-list">
                                  <span>Rp{{ number_format($package->trip_price, 0, ',', '.') }}</span>
                               </h6>
                            </div>
                         </div>
                         <div class="package-meta">
                            <ul>
                               <li>
                                  <i class="fas fa-clock"></i>
                                  {{ $package->trip_days }} {{ $package->trip_days > 1 ? 'days' : 'day' }}
                               </li>
                               <li>
                                <i class="fas fa-hotel"></i>
                                  Category : {{ $package->trip_category }}
                               </li>
                               <li>
                                <i class="fas fa-ship"></i>
                                  Subcategory : {{ $package->trip_subcategory }}
                               </li>
                               <li>
                                  <i class="fas fa-map-marker-alt"></i>
                                  {{ $package->package->location }}
                               </li>
                            </ul>
                         </div>
                         <figure class="single-package-image">
                            <img src="assets/images/img27.jpg" alt="">
                         </figure>
                         <div class="package-content-detail">
                            <article class="package-overview">
                               <h3>OVERVIEW :</h3>
                               {{ $package->trip_note }}
                            </article>
                            <article class="package-include bg-light-grey">
                               <h3><i class="fas fa-check"></i> INCLUDE  :</h3>
                               {{ $package->package->include_list }}
                            </article>
                            <article class="package-include bg-light-grey">
                                <h3><i class="fas fa-times"></i> Exclude  :</h3>
                                {{ $package->package->exclude_list }}
                             </article>
                             @if($package->package->have_itenary)
                            <article class="package-ininerary">
                               <h3>ITINERARY :</h3>
                               {{ $package->package->itenary_list }}
                            </article>
                            @endif
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div class="sidebar">
                         <div class="related-package">
                            <h3>RELATED IMAGES</h3>
                            <p>Quaerat inventore! Vestibulum aenean volutpat gravida. Sagittis, euismod perferendis.</p>
                            <div class="related-package-slide">
                                @if(count($package->images) > 0)
                                @foreach ($package->images as $image)
                               <div class="related-package-item">
                                  <img src="{{ asset($image->images) }}" alt="">
                               </div>
                               @endforeach
                               @endif
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***career section html start form here*** -->
       </section>
    </main>

    @include('traveller.partial.footer')
 </div>
@endsection
