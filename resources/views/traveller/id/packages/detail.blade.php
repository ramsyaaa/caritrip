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
       <section class="package-inner-page">
          <!-- ***Inner Banner html start form here*** -->
          <div class="inner-banner-wrap">
             <div class="inner-baner-container" style="background-image: url({{ asset($package->package_key_visual) }});">
                <div class="container">
                   <div class="inner-banner-content">
                      <h1 class="font-bold text-[40px] text-white mb-4">@if($type == 'Boat Trip'){{ $package->boat->boat_name }} @elseif($type == 'Travel Trip') {{ $package->package_name }} @endif</h1>
                      <a target="_blank" href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan paket {{ $package->package_name }}" class="px-4 py-2 bg-[#2C2D83] text-white rounded-lg mt-4 hover:scale-110">
                        Pesan Sekarang
                       </a>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***Inner Banner html end here*** -->
          <!-- ***career section html start form here*** -->

          <div style="font-family: 'Fredoka', sans-serif !important;" class="inner-package-detail-wrap">
             <div class="container">
                <div class="row">
                   <div class="col-lg-8 primary right-sidebar">
                      <div >
                        <div class="slider h-[200px] md:h-[300px] lg:h-[600px] relative overflow-hidden">
                            @php
                                $isActive = false;
                            @endphp
                            @if(count($package->images) > 0)
                                @foreach ($package->images as $image)
                                    <img src="{{ asset($image->image) }}" class="@if ($loop->iteration == 1) active @php $isActive = true; @endphp @endif">
                                @endforeach
                            @endif
                            @if($type == 'Boat Trip')
                                @if(count($package->boat->images) > 0)
                                    @foreach ($package->boat->images as $image)
                                        <img src="{{ asset($image->key_visual) }}" class="@if ($loop->iteration == 1 && !$isActive) active @php $isActive = true; @endphp @endif">
                                    @endforeach
                                @endif
                            @endif
                            <button class="prev absolute top-1/2 left-8 transform -translate-y-1/2 bg-white bg-opacity-50 text-white p-2 rounded-full w-[50px] h-[50px]">❮</button>
                            <button class="next absolute top-1/2 right-8 transform -translate-y-1/2 bg-white bg-opacity-50 text-white p-2 rounded-full w-[50px] h-[50px]">❯</button>
                        </div>

                         <div class="package-content-detail my-6">
                            @if($type == 'Travel Trip')
                            <article class="text-[16px] mb-[20px]">
                                <h3 class="font-bold text-[32px]">Deskripsi :</h3>
                                {!! $package->description !!}
                            </article>
                            @endif
                            @if($type == 'Boat Trip')
                            <article class="text-[16px] mb-[20px]">
                                <h3 class="font-bold text-[32px]">Detail :</h3>
                                Panjang Kapal : {{ $package->boat->boat_length }} m, Lebar Kapal : {{ $package->boat->boat_width }} m, Kedalaman Kapal : {{ $package->boat->boat_depth }} m, Kecepatan : {{ $package->boat->boat_length }} knots, Tahun Pembuatan : {{ $package->boat->boat_year_built }}, Kapasitas Bensin : {{ $package->boat->boat_fuel_capacity }} L, Kapasitas Air : {{ $package->boat->boat_water_capacity }} L, Asal Kapal : {{ $package->boat->boat_origin }}, Material Kapal : {{ $package->boat->boat_material }}, Mesin Utama : {{ $package->boat->boat_main_engine }}, Dinghy : {{ $package->boat->boat_dingy }}, Kapasitas : {{ $package->boat->boat_capacity }} penumpang, Hiburan : {{ $package->boat->boat_entertainment }}
                             </article>
                            <article class="">
                               {{-- <h3>OVERVIEW :</h3> --}}
                               {{-- {!! $package->trip_note !!} --}}
                            </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4 font-bold text-[32px]">
                                <h3><i class="fas fa-check text-[32px]"></i> Kabin  :</h3>
                                <ol class="text-[16px] font-normal">
                                    @foreach ($package->boat->cabins as $cabin)
                                    <li class="my-4">{{ $loop->iteration }}. @if ($cabin->amount > 1){{ $cabin->amount }} Unit @endif{{ $cabin->name }} : {{ $cabin->description }}</li>
                                    @endforeach
                                </ol>
                             </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                                <h3 class="text-[32px] font-bold"><i class="fas fa-check text-[32px] font-bold mb-4"></i> Fasilitas  :</h3>
                                {!! $package->boat->boat_facility !!}
                             </article>
                             <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                                <h3 class="text-[32px] font-bold"><i class="fas fa-check text-[32px] font-bold mb-4"></i> Peralatan Keselamatan  :</h3>
                                {!! $package->boat->boat_safety_equipment !!}
                             </article>
                             @endif
                            <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                               <h3 class="text-[32px] font-bold"><i class="fas fa-check text-[32px] font-bold mb-4"></i> Include  :</h3>
                               {!! $package->include_list !!}
                            </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                                <h3 class="text-[32px] font-bold"><i class="fas fa-times text-[32px] font-bold mb-4"></i> Exclude  :</h3>
                                {!! $package->exclude_list !!}
                             </article>
                             @if($package->have_itenary)
                            <article class="mb-[20px] px-4 py-4  text-[16px]">
                               <h3 class="text-[32px] font-bold mb-4">Itinerary :</h3>
                               {!! $package->itenary_list !!}
                            </article>
                            @endif
                            <div class="w-full flex justify-center">
                                {!! $package->instagram_post !!}
                            </div>
                            <div class="flex justify-center w-full">
                                <a class="px-4 py-2 text-white text-center text-[24px] rounded-lg bg-[#2C2D83] mt-4" target="_blank" href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan paket {{ $package->package_name }}">Pesan Sekarang</a>
                            </div>
                        </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div class="sidebar">
                         <div class="">
                            <div class="flex justify-center font-bold text-[30px] mb-4">
                                <h2 style="font-family: 'Fredoka', sans-serif !important;">{{ $package->package_name }}</h2>
                            </div>
                            <div class="border-t border-b py-4 flex justify-center">
                                <div class="flex gap-4 items-center">
                                    @if($type == 'Boat Trip')
                                    <div style="font-family: 'Fredoka', sans-serif !important;" class="px-4 border-r-[3px]">
                                        <i style="color: #2C2D83" class="fas fa-ship"></i>
                                        {{ $package->trip_subcategory }}
                                    </div>
                                    @endif
                                    <div style="font-family: 'Fredoka', sans-serif !important;" class="px-4">
                                       <i style="color: #2C2D83" class="fas fa-map-marker-alt"></i>
                                       {{ $package->destination ? $package->destination->name : '' }}
                                    </div>
                                 </div>
                             </div>
                         </div>

                         <div class="relative w-full" x-data="{
                            openTrip: @if($category == 'Open Trip' || (!$category && count($package->openTrips) > 0)) true @else false @endif,
                            privateTrip: @if($category == 'Private Trip' || (!$category && count($package->openTrips) <= 0)) true @else false @endif,
                            fullDayCruise: @if($category == 'Full Day Cruise' || (!$category && (count($package->openTrips) == 0 && count($package->privateTrips) == 0))) true @else false @endif
                            }">
                            <div class="flex items-center max-w-screen overflow-x-auto whitespace-nowrap hide-scrollbar">
                                @if(($category == 'Open Trip' || !$category) && count($package->openTrips) > 0)
                                <div @click="openTrip=true;privateTrip=false;fullDayCruise=false" :class="openTrip ? ' bg-[#2C2D83] text-white' : ''" class="w-full px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                    Open Trip
                                </div>
                                @endif
                                @if(($category == 'Private Trip' || !$category) && count($package->openTrips) > 0)
                                <div @click="openTrip=false;privateTrip=true;fullDayCruise=false" :class="privateTrip ? ' bg-[#2C2D83] text-white' : ''" class="w-full px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                    Private Trip
                                </div>
                                @endif
                                @if($type == 'Boat Trip')
                                @if(($category == 'Full Day Cruise' || !$category) && count($package->openTrips) > 0)
                                <div @click="openTrip=false;privateTrip=false;fullDayCruise=true" :class="fullDayCruise ? ' bg-[#2C2D83] text-white' : ''" class="w-full px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                    Full Day Cruise
                                </div>
                                @endif
                                @endif
                            </div>

                            <div>
                                @if(($category == 'Open Trip' || !$category) && count($package->openTrips) > 0)
                                <div x-show="openTrip" class="p-2 bg-[#2C2D83] rounded-b-lg"
                                    x-data="{
                                        @foreach ($package->openTrips as $item)
                                            openTrip{{ $loop->iteration }}: @if ($loop->iteration == 1) true @else false @endif,
                                        @endforeach
                                        setActiveTrip(index) {
                                            @foreach ($package->openTrips as $item)
                                                this.openTrip{{ $loop->iteration }} = false;
                                            @endforeach
                                            this['openTrip' + index] = true;
                                        }
                                    }">
                                    <div class="flex items-center max-w-screen overflow-x-auto whitespace-nowrap hide-scrollbar">
                                        @foreach ($package->openTrips as $item)
                                            <div :class="openTrip{{ $loop->iteration }} ? 'bg-gray-200' : 'text-white'"
                                                @click="setActiveTrip({{ $loop->iteration }})"
                                                class="px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                                @if($type == 'Boat Trip')
                                                Kabin {{ $loop->iteration }}
                                                @elseif ($type == 'Travel Trip')
                                                {{ date("d M y", strtotime($item->date)) }}
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-b-lg rounded-tr-lg p-4">
                                        @foreach ($package->openTrips as $item)
                                        <div x-show="openTrip{{ $loop->iteration }}">
                                            <div class="w-full flex justify-center">
                                                <img src="@if($type == 'Boat Trip') {{ asset($item->cabin->image) }} @elseif($type == 'Travel Trip') {{ asset($item->travelPackage->package_key_visual) }}  @endif" class="w-full" alt="">
                                            </div>
                                            <div class="mt-4 flex justify-center text-[20px] font-bold">
                                                @if($type == 'Boat Trip') {{ $item->cabin->name }} @endif ({{ $item->duration }})
                                            </div>
                                            @if($type == 'Boat Trip')
                                            <div class="mt-4">
                                                {{ $item->cabin->description }}
                                            </div>
                                            @endif
                                            <div class="mt-4 text-[24px]">
                                                Mulai dari : Rp{{ number_format($item->price, 0, ',', '.') }} / pax
                                            </div>
                                            @if($type == 'Boat Trip')
                                            <div class="mt-4 text-[16px]">
                                                Extra kasur : Rp{{ number_format($item->extra_bed_price, 0, ',', '.') }}
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if(($category == 'Private Trip' || !$category) && count($package->openTrips) > 0)
                                <div x-show="privateTrip" class="p-2 bg-[#2C2D83] rounded-b-lg"
                                    x-data="{
                                        @foreach ($package->privateTrips as $item)
                                            privateTrip{{ $loop->iteration }}: @if ($loop->iteration == 1) true @else false @endif,
                                        @endforeach
                                        setActiveTrip(index) {
                                            @foreach ($package->privateTrips as $item)
                                                this.privateTrip{{ $loop->iteration }} = false;
                                            @endforeach
                                            this['privateTrip' + index] = true;
                                        }
                                    }">
                                    <div class="flex items-center max-w-screen overflow-x-auto whitespace-nowrap hide-scrollbar">
                                        @foreach ($package->privateTrips as $item)
                                            <div :class="privateTrip{{ $loop->iteration }} ? 'bg-gray-200' : 'text-white'"
                                                @click="setActiveTrip({{ $loop->iteration }})"
                                                class="px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                                {{ $item->pax }} penumpang
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-b-lg rounded-tr-lg p-4" style="font-family: 'Fredoka', sans-serif !important;">
                                        @foreach ($package->privateTrips as $item)
                                        <div x-show="privateTrip{{ $loop->iteration }}">
                                            <div class="w-full flex justify-center">
                                                <img src="@if($type == 'Boat Trip') {{ asset($item->boatTravelPackage->package_key_visual) }} @elseif($type == 'Travel Trip') {{ asset($item->travelPackage->package_key_visual) }}  @endif" class="w-full" alt="">
                                            </div>
                                            <div class="mt-4 flex justify-center text-[20px] font-bold">
                                                ({{ $item->duration }})
                                            </div>
                                            <div class="mt-4">
                                                {{-- {{ $item->cabin->description }} --}}
                                            </div>
                                            <div class="mt-4 text-[24px]">
                                                Mulai Dari : Rp{{ number_format($item->price, 0, ',', '.') }}
                                            </div>
                                            <div class="mt-4 text-[16px]">
                                                {{-- Extra Bed : Rp{{ number_format($item->extra_bed_price, 0, ',', '.') }} --}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if($type == 'Boat Trip')
                                @if(($category == 'Full Day Cruise' || !$category) && count($package->openTrips) > 0)
                                <div x-show="fullDayCruise" class="p-2 bg-[#2C2D83] rounded-b-lg"
                                    x-data="{
                                        @foreach ($package->fullDayCruises as $item)
                                            fullDayCruise{{ $loop->iteration }}: @if ($loop->iteration == 1) true @else false @endif,
                                        @endforeach
                                        setActiveTrip(index) {
                                            @foreach ($package->fullDayCruises as $item)
                                                this.fullDayCruise{{ $loop->iteration }} = false;
                                            @endforeach
                                            this['fullDayCruise' + index] = true;
                                        }
                                    }">
                                    <div class="flex items-center max-w-screen overflow-x-auto whitespace-nowrap hide-scrollbar">
                                        @foreach ($package->fullDayCruises as $item)
                                            <div :class="fullDayCruise{{ $loop->iteration }} ? 'bg-gray-200' : 'text-white'"
                                                @click="setActiveTrip({{ $loop->iteration }})"
                                                class="px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                                {{ $item->pax }} penumpang
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-b-lg rounded-tr-lg p-4" style="font-family: 'Fredoka', sans-serif !important;">
                                        @foreach ($package->fullDayCruises as $item)
                                        <div x-show="fullDayCruise{{ $loop->iteration }}">
                                            <div class="w-full flex justify-center">
                                                <img src="{{ asset($item->boatTravelPackage->package_key_visual) }}" class="w-full" alt="">
                                            </div>
                                            <div class="mt-4 text-[24px]">
                                                Mulai Dari : Rp{{ number_format($item->price, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="w-full flex justify-center">
                            <a target="_blank" href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan paket {{ $package->package_name }}" class="px-4 py-2 rounded-lg text-white bg-[#2C2D83] hover:scale-110 duration-500">
                                Pesan Sekarang
                            </a>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.slider img');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        let currentIndex = 0;
        let interval;

        function showImage(index) {
            images[currentIndex].classList.remove('active');
            currentIndex = (index + images.length) % images.length;
            images[currentIndex].classList.add('active');
        }

        function startSlideshow() {
            interval = setInterval(() => {
                showImage(currentIndex + 1);
            }, 5000);
        }

        function stopSlideshow() {
            clearInterval(interval);
        }

        prevButton.addEventListener('click', () => {
            stopSlideshow();
            showImage(currentIndex - 1);
            startSlideshow();
        });

        nextButton.addEventListener('click', () => {
            stopSlideshow();
            showImage(currentIndex + 1);
            startSlideshow();
        });

        startSlideshow();
    });
</script>

@endsection
