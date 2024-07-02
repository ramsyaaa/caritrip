<header id="masthead" class="site-header">
    <!-- header html start -->
    <div class="top-header">
       <div class="container">
          <div class="top-header-inner">
             <div class="header-contact text-left">
                <a href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan yang tersedia.">
                   <i aria-hidden="true" class="icon icon-phone-call2" style="background-color: #2C2D83"></i>
                   <div class="header-contact-details d-none d-sm-block">
                      <span class="contact-label">For Further Inquires :</span>
                      <h5 class="header-contact-no">+62 822 3679 2273</h5>
                   </div>
                </a>
             </div>
             <div class="site-logo text-center flex justify-center">
                <p class="site-title">
                   <a href="/">
                      <img src="{{ asset('assets/logos/caritrip.png') }}" alt="Logo">
                   </a>
                </p>
             </div>
             <div class="header-icon text-right">
                <div class="header-search-icon d-inline-block">
                </div>
                <div class="offcanvas-menu d-inline-block">
                   <a href="#">
                      <i aria-hidden="true" class="icon icon-burger-menu"></i>
                   </a>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="bottom-header">
       <div class="container">
          <div class="bottom-header-inner d-flex justify-content-between align-items-center">
             <div class="header-social social-icon">
                <ul>
                    <li>
                        <a href="https://www.tiktok.com/@cari_trip?is_from_webapp=1&sender_device=pc" target="_blank">
                            <i class="fab fa-tiktok" aria-hidden="true"></i>
                        </a>
                    </li>
                   <li>
                      <a href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan yang tersedia." target="_blank">
                         <i class="fab fa-whatsapp" aria-hidden="true"></i>
                      </a>
                   </li>
                   <li>
                        <a href="https://www.instagram.com/caritrip.id/?utm_source=ig_web_button_share_sheet" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                   <li>
                        <a href="mailto:admincaritrip@gmail.com?subject=Caritrip Asking&body=Hello, I am from the Caritrip website and am interested in your trip package. Could you please provide more details about it?.">
                            <i class="icon icon-envelope1" aria-hidden="true"></i>
                      </a>
                   </li>
                </ul>
             </div>
             <div class="navigation-container d-none d-lg-block">
                <nav id="navigation" class="navigation">
                   <ul>
                      <li>
                         <a style="@if (request()->is('/') || request()->is('/*')) color: #2C2D83 @endif" href="/">Beranda</a>
                      </li>
                      <li class="menu-item-has-children">
                        <a style="@if (request()->is('destinations') || request()->is('destinations/*')) color: #2C2D83 @endif" href="#">Destinasi</a>
                        <ul>
                            @foreach ($destinations_navbar as $key => $destination)
                           <li class="menu-item-has-children">
                                <a href="#">{{ $key }}</a>
                                <ul>
                                    @foreach ($destination as $item)
                                        <li >
                                            <a href="{{ route('destinations.detail', ['id' => $item['id']]) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                <li style="display:none">
                                    <a href="{{ route('packages') }}">All Packages</a>
                                </li>
                                    <li style="display:none">
                                        <a href="{{ route('packages') }}">Single Page</a>
                                    </li>
                                </ul>
                            </li>
                            <li style="display:none">
                              <a href="{{ route('packages') }}">All Packages</a>
                           </li>
                           @endforeach
                            <li style="display:none">
                                <a href="{{ route('packages') }}">Single Page</a>
                            </li>
                        </ul>
                     </li>
                     <li class="menu-item-has-children">
                        <a href="#">Internasional</a>
                        <ul>
                            @foreach ($international as $key => $destination)
                           <li>
                                <a href="/packages/?destination_id={{ $destination->id }}">{{ $destination->name }}</a>
                            </li>
                            <li style="display:none">
                              <a href="{{ route('packages') }}">All Packages</a>
                           </li>
                           @endforeach
                            <li style="display:none">
                                <a href="{{ route('packages') }}">Single Page</a>
                            </li>
                        </ul>
                     </li>
                     <li class="menu-item-has-children">
                        <a href="#">Domestik</a>
                        <ul>
                            @foreach ($domestics as $key => $destination)
                           <li class="menu-item-has-children">
                                <a href="/packages/?destination_id={{ $destination['destination_id'] }}">{{ $key }}</a>
                                <ul>
                                    <li class="menu-item-has-children">
                                        <a href="/packages/?destination_id={{ $destination['destination_id'] }}&category=Open Trip">Open Trip</a>
                                        <ul>
                                            @foreach ($destination['openTrips'] as $key => $item)
                                            <li>
                                                <a href="{{ route('packages.detail', ['id' => $item->id, 'type' => 'Boat Trip']) }}">{{ $item->package_name }}</a>
                                            </li>
                                            @endforeach
                                            <li style="display:none">
                                                <a href="{{ route('packages') }}">All Packages</a>
                                            </li>
                                            <li style="display:none">
                                                <a href="{{ route('packages') }}">Single Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/packages/?destination_id={{ $destination['destination_id'] }}&category=Private Trip">Private Trip</a>
                                        <ul>
                                            @foreach ($destination['privateTrips'] as $key => $item)
                                            <li>
                                                <a href="{{ route('packages.detail', ['id' => $item->id, 'type' => 'Boat Trip']) }}">{{ $item->package_name }}</a>
                                            </li>
                                            @endforeach
                                            <li style="display:none">
                                                <a href="{{ route('packages') }}">All Packages</a>
                                            </li>
                                            <li style="display:none">
                                                <a href="{{ route('packages') }}">Single Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/packages/?destination_id={{ $destination['destination_id'] }}&category=Full Day Cruise">Full Day Cruise</a>
                                        <ul>
                                            @foreach ($destination['fullDayCruises'] as $key => $item)
                                            <li>
                                                <a href="{{ route('packages.detail', ['id' => $item->id, 'type' => 'Boat Trip']) }}">{{ $item->package_name }}</a>
                                            </li>
                                            @endforeach
                                            <li style="display:none">
                                                <a href="{{ route('packages') }}">All Packages</a>
                                            </li>
                                            <li style="display:none">
                                                <a href="{{ route('packages') }}">Single Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li style="display:none">
                                        <a href="{{ route('packages') }}">All Packages</a>
                                    </li>
                                    <li style="display:none">
                                        <a href="{{ route('packages') }}">Single Page</a>
                                    </li>
                                </ul>
                            </li>
                           @endforeach
                           <li style="display:none">
                              <a href="{{ route('packages') }}">All Packages</a>
                           </li>
                            <li style="display:none">
                                <a href="{{ route('packages') }}">Single Page</a>
                            </li>
                        </ul>
                     </li>
                      <li>
                        <a style="@if (request()->is('blogs') || request()->is('blogs/*')) color: #2C2D83 @endif" href="{{ route('blogs.index') }}">Blog</a>
                     </li>
                      <li>
                        <a style="@if (request()->is('contact') || request()->is('contact/*')) color: #2C2D83 @endif" href="{{ route('contact') }}">Kontak</a>
                      </li>
                   </ul>
                </nav>
             </div>
             <div class="header-btn">
                <a target="_blank" style="background-color: #2C2D83" href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan yang tersedia." class="round-btn">Pesan Sekarang</a>
             </div>
          </div>
       </div>
    </div>
    <div class="mobile-menu-container"></div>
 </header>
