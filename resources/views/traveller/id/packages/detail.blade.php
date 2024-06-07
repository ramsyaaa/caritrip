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
             <div class="inner-baner-container" style="background-image: url({{ asset($package->package_key_visual) }});">
                <div class="container">
                   <div class="inner-banner-content">
                      <h1 class="font-bold text-[40px] text-white mb-4">{{ $package->boat->boat_name }}</h1>
                      <a href="" class="px-4 py-2 bg-[#2C2D83] text-white rounded-lg mt-4 hover:scale-110">
                        Book Now
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

                        <div class="flex justify-center">
                            <div class="image-container carousel-center w-full p-4 space-x-4 rounded-box flex relative overflow-hidden" >
                                @if(count($package->images) > 0)
                                @foreach ($package->images as $image)
                                <div class="carousel-item w-full rounded-box bg-white">
                                  <img src="{{ asset($image->images) }}" class="" style="transition: transform 0.5s ease-in-out;" />
                                </div>
                                @endforeach
                                @endif
                                @if(count($package->boat->images) > 0)
                                @foreach ($package->boat->images as $image)
                                <div class="carousel-item w-full rounded-box bg-white">
                                  <img src="{{ asset($image->key_visual) }}" class="" style="transition: transform 0.5s ease-in-out;" />
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                         <div class="package-content-detail">
                            <article class="text-[16px] mb-[20px]">
                                <h3 class="font-bold text-[32px]">Detail :</h3>
                                Boat Length : {{ $package->boat->boat_length }} m, Boat Width : {{ $package->boat->boat_width }} m, Boat Depth : {{ $package->boat->boat_depth }} m, Boat Speed : {{ $package->boat->boat_length }} knots, Boat Year Build : {{ $package->boat->boat_year_built }}, Boat Fuel Capacity : {{ $package->boat->boat_fuel_capacity }} L, Boat Water Capacity : {{ $package->boat->boat_water_capacity }} L, Boat Origin : {{ $package->boat->boat_origin }}, Boat Material : {{ $package->boat->boat_material }}, Boat Engine : {{ $package->boat->boat_main_engine }}, Boat Dingy : {{ $package->boat->boat_dingy }}, Boat Capacity : {{ $package->boat->boat_capacity }} pax, Boat Entertaiment : {{ $package->boat->boat_entertainment }}
                             </article>
                            <article class="">
                               {{-- <h3>OVERVIEW :</h3> --}}
                               {{-- {!! $package->trip_note !!} --}}
                            </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4 font-bold text-[32px]">
                                <h3><i class="fas fa-check text-[32px]"></i> Cabin  :</h3>
                                <ol class="text-[16px] font-normal">
                                    @foreach ($package->boat->cabins as $cabin)
                                    <li class="my-4">{{ $loop->iteration }}. @if ($cabin->amount > 1){{ $cabin->amount }} Unit @endif{{ $cabin->name }} : {{ $cabin->description }}</li>
                                    @endforeach
                                </ol>
                             </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                                <h3 class="text-[32px] font-bold"><i class="fas fa-check text-[32px] font-bold mb-4"></i> Boat Facilities  :</h3>
                                {!! $package->boat->boat_facility !!}
                             </article>
                             <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                                <h3 class="text-[32px] font-bold"><i class="fas fa-check text-[32px] font-bold mb-4"></i> Boat Safety Equipments  :</h3>
                                {!! $package->boat->boat_safety_equipment !!}
                             </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                               <h3 class="text-[32px] font-bold"><i class="fas fa-check text-[32px] font-bold mb-4"></i> INCLUDE  :</h3>
                               {!! $package->include_list !!}
                            </article>
                            <article class="bg-light-grey mb-[20px] px-4 py-4  text-[16px]">
                                <h3 class="text-[32px] font-bold"><i class="fas fa-times text-[32px] font-bold mb-4"></i> Exclude  :</h3>
                                {!! $package->exclude_list !!}
                             </article>
                             @if($package->have_itenary)
                            <article class="mb-[20px] px-4 py-4  text-[16px]">
                               <h3 class="text-[32px] font-bold mb-4">ITENARY (OPEN TRIP) :</h3>
                               {!! $package->itenary_list !!}
                            </article>
                            @endif
                            <iframe width="560" height="560" src="{{ $package->boat->highlight_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <div class="flex justify-center w-full">
                                <a class="px-4 py-2 text-white text-center text-[24px] rounded-lg bg-[#2C2D83] mt-4" href="">Book Now</a>
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
                                    <div style="font-family: 'Fredoka', sans-serif !important;" class="px-4 border-r-[3px]">
                                        <i style="color: #2C2D83" class="fas fa-ship"></i>
                                        {{ $package->trip_subcategory }}
                                    </div>
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
                                @if(($category == 'Full Day Cruise' || !$category) && count($package->openTrips) > 0)
                                <div @click="openTrip=false;privateTrip=false;fullDayCruise=true" :class="fullDayCruise ? ' bg-[#2C2D83] text-white' : ''" class="w-full px-4 py-2 font-bold text-[16px] flex justify-center rounded-t-lg cursor-pointer duration-500">
                                    Full Day Cruise
                                </div>
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
                                                Cabin {{ $loop->iteration }}
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-b-lg rounded-tr-lg p-4">
                                        @foreach ($package->openTrips as $item)
                                        <div x-show="openTrip{{ $loop->iteration }}">
                                            <div class="w-full flex justify-center">
                                                <img src="{{ asset($item->cabin->image) }}" class="max-h-[150px]" alt="">
                                            </div>
                                            <div class="mt-4 flex justify-center text-[20px] font-bold">
                                                {{ $item->cabin->name }} ({{ $item->duration }})
                                            </div>
                                            <div class="mt-4">
                                                {{ $item->cabin->description }}
                                            </div>
                                            <div class="mt-4 text-[24px]">
                                                Start From : Rp{{ number_format($item->price, 0, ',', '.') }} / pax
                                            </div>
                                            <div class="mt-4 text-[16px]">
                                                Extra Bed : Rp{{ number_format($item->extra_bed_price, 0, ',', '.') }}
                                            </div>
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
                                                {{ $item->pax }} pax
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-b-lg rounded-tr-lg p-4" style="font-family: 'Fredoka', sans-serif !important;">
                                        @foreach ($package->privateTrips as $item)
                                        <div x-show="privateTrip{{ $loop->iteration }}">
                                            <div class="w-full flex justify-center">
                                                <img src="{{ asset($item->boatTravelPackage->package_key_visual) }}" class="max-h-[150px]" alt="">
                                            </div>
                                            <div class="mt-4 flex justify-center text-[20px] font-bold">
                                                ({{ $item->duration }})
                                            </div>
                                            <div class="mt-4">
                                                {{-- {{ $item->cabin->description }} --}}
                                            </div>
                                            <div class="mt-4 text-[24px]">
                                                Start From : Rp{{ number_format($item->price, 0, ',', '.') }}
                                            </div>
                                            <div class="mt-4 text-[16px]">
                                                {{-- Extra Bed : Rp{{ number_format($item->extra_bed_price, 0, ',', '.') }} --}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
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
                                                {{ $item->pax }} pax
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-b-lg rounded-tr-lg p-4" style="font-family: 'Fredoka', sans-serif !important;">
                                        @foreach ($package->fullDayCruises as $item)
                                        <div x-show="fullDayCruise{{ $loop->iteration }}">
                                            <div class="w-full flex justify-center">
                                                <img src="{{ asset($item->boatTravelPackage->package_key_visual) }}" class="max-h-[150px]" alt="">
                                            </div>
                                            <div class="mt-4 text-[24px]">
                                                Start From : Rp{{ number_format($item->price, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="w-full flex justify-center">
                            <a href="" class="px-4 py-2 rounded-lg text-white bg-[#2C2D83] hover:scale-110 duration-500">
                                Book Now
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
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.querySelector('.image-container');
        const items = container.querySelectorAll('.carousel-item');
        let currentIndex = 0;
        const totalItems = items.length;

        function showNextItem() {
            items[currentIndex].style.transform = `translateX(0)`;
            currentIndex = (currentIndex + 1) % totalItems;
            items[currentIndex].style.transform = `translateX(-100%)`;
            container.appendChild(items[currentIndex]);
        }

        setInterval(showNextItem, 1500);
    });
</script>
@endsection
