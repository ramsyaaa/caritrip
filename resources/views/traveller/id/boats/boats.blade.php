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
                        <h1 class="font-bold text-white text-[32px]">Daftar Kapal Kami</h1>
                        </div>
                    </div>
                </div>

            </div>
             <!-- ***Inner Banner html end here*** -->
             <!-- ***package section html start form here*** -->
             <div class="w-full">
                <div class="container">
                    @foreach ($boats as $item)
                    <article class="w-full lg:flex lg:items-start gap-4 bg-gray-200 p-4 rounded-lg mb-4 shadow-md">
                        <img class="w-full lg:max-w-[300px] rounded-lg shadow-lg" src="{{ asset($item->boat_featured_image) }}">
                       <div class="w-full">
                          <h3>
                             <div class="font-bold text-[24px] mt-4 text-center">
                                {{ $item->boat_name }}
                             </div>
                          </h3>
                          <div class="my-4">
                            @if($item->boat_length != null) Panjang Kapal : {{ $item->boat_length }} m, @endif
                            @if($item->boat_width != null) Lebar Kapal : {{ $item->boat_width }} m, @endif
                            @if($item->boat_depth != null )Kedalaman Kapal : {{ $item->boat_depth }} m, @endif
                            @if($item->boat_length != null) Kecepatan : {{ $item->boat_length }} knots, @endif
                            @if($item->boat_year_built != null) Tahun Pembuatan : {{ $item->boat_year_built }}, @endif
                            @if($item->boat_fuel_capacity != null) Kapasitas Bensin : {{ $item->boat_fuel_capacity }} L, @endif
                            @if($item->boat_water_capacity != null) Kapasitas Air : {{ $item->boat_water_capacity }} L, @endif
                            @if($item->boat_origin != null) Asal Kapal : {{ $item->boat_origin }}, @endif
                            @if($item->boat_material != null) Material Kapal : {{ $item->boat_material }}, @endif
                            @if($item->boat_main_engine != null) Mesin Utama : {{ $item->boat_main_engine }}, @endif
                            @if($item->boat_dingy != null) Dinghy : {{ $item->boat_dingy }}, @endif
                            @if($item->boat_capacity != null) Kapasitas Kapal : {{ $item->boat_capacity }} penumpang, @endif
                            @if($item->boat_entertainment != null) Hiburan : {{ $item->boat_entertainment }} @endif
                          </div>

                          <div class="font-bold text-[20px] my-4">
                            Daftar Paket untuk kapal ini :
                          </div>

                            @foreach ($item->packages as $item1)
                                <article class="w-full lg:flex gap-3 items-center mb-4 bg-white p-4 rounded-lg">
                                <img class="max-w-[200px] rounded-lg" src="{{ asset($item1->package_key_visual) }}">
                                <div class="w-full">
                                    <h3 class="w-full">
                                        <div class="font-bold text-[24px]">
                                            {{ $item1->package_name }}
                                        </div>
                                    </h3>

                                    <div class="mt-4 mb-4 lg:mb-0">
                                        <ul class="flex gap-4">
                                            <li style="margin-bottom: 4px">
                                                <i style="color: #2C2D83" class="fas fa-ship"></i>
                                                {{ $item1->trip_subcategory }}
                                            </li>
                                            <li style="margin-bottom: 4px">
                                               <i style="color: #2C2D83" class="fas fa-map-marker-alt"></i>
                                               {{ $item1->destination->name }}
                                            </li>
                                         </ul>
                                      </div>

                                </div>
                                <div style="background-color: #2C2D83" class="p-4 w-full flex justify-center rounded-lg">
                                    <div class="flex flex-col gap-4">
                                        <div>
                                            <span class="font-bold text-[24px] text-white">Mulai dari</span>
                                        </div>
                                        <h6>
                                            <span class="font-bold text-[24px] text-white">Rp @if(count($item1->openTrips) > 0) {{ number_format($item1->openTrips[0]->price, 0, ',', '.') }} @elseif(count($item1->privateTrips) > 0) {{ number_format($item1->privateTrips[0]->price, 0, ',', '.') }} @elseif(count($item1->fullDayCruises) > 0) {{ number_format($item1->fullDayCruises[0]->price, 0, ',', '.') }} @else 0 @endif </span>
                                        </h6>
                                        <a href="{{ route('packages.detail', ['id' => $item1->id, 'type' => 'Boat Trip']) }}"
                                            style="border-radius: 20px; border: 2px solid white; font-size: 16px; padding: 10px 20px; color: white; display: inline-block; text-align: center;"
                                            onMouseOver="this.style.backgroundColor='#F6B334'; this.style.color='white';"
                                            onMouseOut="this.style.backgroundColor='transparent'; this.style.color='white';">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                                </article>
                            @endforeach
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
