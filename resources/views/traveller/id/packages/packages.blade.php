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
                        <h1 class="font-bold text-white text-[32px]">List Paket Perjalanan @if($type) {{ $type }} @endif @if($category) ({{ $category }}) @endif <br><p class="text-center">@if($destination) {{ $destination->name }} @endif</p></h1>
                        </div>
                    </div>
                </div>

            </div>
             <!-- ***Inner Banner html end here*** -->
             @if(count($trips) > 0)
             <!-- ***package section html start form here*** -->
             <div class="package-item-wrap">
                <div class="w-full text-center mb-4 font-bold text-[24px]">
                    Paket Perjalanan Kapal
                </div>
                <div class="destination-item-wrap">
                    <div class="container">
                        <div class="row gx-5">
                            @foreach ($trips as $trip)
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
                                            <span style="font-family: 'Fredoka', sans-serif !important;">Rp @if(count($trip->openTrips) > 0) {{ number_format($trip->openTrips[0]->price, 0, ',', '.') }} {{ $trip->openTrips[0]->unit }} @elseif(count($trip->privateTrips) > 0) {{ number_format($trip->privateTrips[0]->price, 0, ',', '.') }} {{ $trip->privateTrips[0]->unit }} @elseif(count($trip->fullDayCruises) > 0) {{ number_format($trip->fullDayCruises[0]->price, 0, ',', '.') }} {{ $trip->fullDayCruises[0]->unit }} @else 0 @endif </span>
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
             </div>
             <!-- ***package section html start form here*** -->
             @endif

             @if(count($travels) > 0)
             <!-- ***package section html start form here*** -->
             <div class="package-item-wrap">
                <div class="w-full text-center mb-4 font-bold text-[24px]">
                    Paket Travel
                </div>
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



             </div>
             <!-- ***package section html start form here*** -->
             @endif
          </section>
       </main>
       @include('traveller.partial.footer')
    </div>
@endsection
