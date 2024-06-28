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
                        <h1 class="font-bold text-white text-[32px]">Destinasi Seru</h1>
                        </div>
                    </div>
                </div>

            </div>
             <!-- ***Inner Banner html end here*** -->
             <!-- ***package section html start form here*** -->
             <div class="w-full">
                <div class="container">
                    <div class="destination-item-wrap">
                        <div class="container">
                            <div class="row gx-5">
                                @foreach ($destinations as $destination)
                                <div class="col-lg-4 col-md-6">
                                <article class="destination-item" style="background-image: url({{ asset($destination->destination_image) }});">
                                    <div class="destination-content w-full">
                                        <div class="package-meta">
                                        </div>
                                        <h3>
                                            <a href="{{ route('destinations.detail', ['id' => $destination->id]) }}" style="font-family: 'Fredoka', sans-serif !important;">{{ $destination->name }}</a>
                                        </h3>
                                        {{-- <div class="">
                                            <span class="text-[16px] mt-2" style="font-family: 'Fredoka', sans-serif !important;">Mulai dari</span>
                                        </div>
                                        <h6 class="text-[24px] mt-1">
                                            <span style="font-family: 'Fredoka', sans-serif !important;">Rp @if(count($trip->openTrips) > 0) {{ number_format($trip->openTrips[0]->price, 0, ',', '.') }} @elseif(count($trip->privateTrips) > 0) {{ number_format($trip->privateTrips[0]->price, 0, ',', '.') }} @elseif(count($trip->fullDayCruises) > 0) {{ number_format($trip->fullDayCruises[0]->price, 0, ',', '.') }} @else 0 @endif </span>
                                        </h6> --}}
                                        <div class="w-full flex items-center justify-end">
                                            <a href="{{ route('destinations.detail', ['id' => $destination->id]) }}" class="px-3 py-2 bg-[#2C2D83] text-white rounded-lg">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </article>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <!-- ***package section html start form here*** -->
          </section>
       </main>
       @include('traveller.partial.footer')
    </div>
@endsection
