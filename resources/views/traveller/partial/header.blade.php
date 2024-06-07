<header id="masthead" class="site-header">
    <!-- header html start -->
    <div class="top-header">
       <div class="container">
          <div class="top-header-inner">
             <div class="header-contact text-left">
                <a href="telto:01977259912">
                   <i aria-hidden="true" class="icon icon-phone-call2" style="background-color: #2C2D83"></i>
                   <div class="header-contact-details d-none d-sm-block">
                      <span class="contact-label">For Further Inquires :</span>
                      <h5 class="header-contact-no">+01 (977) 2599 12</h5>
                   </div>
                </a>
             </div>
             <div class="site-logo text-center flex justify-center">
                <p class="site-title">
                   <a href="index.html">
                      <img src="{{ asset('assets/logos/caritrip.png') }}" alt="Logo">
                   </a>
                </p>
             </div>
             <div class="header-icon text-right">
                <div class="header-search-icon d-inline-block">
                   {{-- <a href="#">
                      <i aria-hidden="true" class="fas fa-search"></i>
                   </a> --}}
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
                      <a href="https://wa.me/+6282211955103?text=Hello, I am from the Caritrip website and am interested in your trip package. Could you please provide more details about it?." target="_blank" target="_blank">
                         <i class="fab fa-whatsapp" aria-hidden="true"></i>
                      </a>
                   </li>
                   <li>
                    <a href="mailto:alifnaufalrizki27@gmail.com?subject=Caritrip Asking&body=Hello, I am from the Caritrip website and am interested in your trip package. Could you please provide more details about it?.">
                         <i class="icon icon-envelope1" aria-hidden="true"></i>
                      </a>
                   </li>
                </ul>
             </div>
             <div class="navigation-container d-none d-lg-block">
                <nav id="navigation" class="navigation">
                   <ul>
                      <li>
                         <a style="@if (request()->is('/') || request()->is('/*')) color: #2C2D83 @endif" href="/">Home</a>
                      </li>
                      <li>
                        <a style="@if (request()->is('about') || request()->is('about/*')) color: #2C2D83 @endif" href="{{ route('about') }}">about us</a>
                      </li>
                      <li>
                        <a style="@if (request()->is('boats') || request()->is('boats/*')) color: #2C2D83 @endif" href="{{ route('boats') }}">boats</a>
                     </li>
                     <li class="menu-item-has-children">
                        <a style="@if (request()->is('packages') || request()->is('packages/*')) color: #2C2D83 @endif" href="{{ route('packages') }}">Packages</a>
                        <ul>
                           <li class="menu-item-has-children">
                              <a href="{{ route('packages', ['category' => 'Open Trip']) }}">Open Trip</a>
                              <ul>
                                @foreach ($navbarOpenTrips as $item)
                                <li>
                                    <a href="{{ route('packages.detail', ['id' => $item->id]) }}">{{ $item->package_name }}</a>
                                 </li>
                                @endforeach
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                              <a href="{{ route('packages', ['category' => 'Private Trip']) }}">Private Trip</a>
                              <ul>
                                @foreach ($navbarPrivateTrips as $item)
                                <li>
                                    <a href="{{ route('packages.detail', ['id' => $item->id]) }}">{{ $item->package_name }}</a>
                                 </li>
                                @endforeach
                              </ul>
                           </li>
                           <li class="menu-item-has-children">
                                <a href="{{ route('packages', ['category' => 'Full Day Cruise']) }}">Full Day Cruise</a>
                                <ul>
                                    @foreach ($navbarFullDayCruises as $item)
                                    <li>
                                        <a href="{{ route('packages.detail', ['id' => $item->id]) }}">{{ $item->package_name }}</a>
                                    </li>
                                    @endforeach
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
                      <li>
                        <a style="@if (request()->is('blogs') || request()->is('blogs/*')) color: #2C2D83 @endif" href="{{ route('blogs.index') }}">blogs</a>
                     </li>
                      <li>
                        <a style="@if (request()->is('contact') || request()->is('contact/*')) color: #2C2D83 @endif" href="{{ route('contact') }}">contact</a>
                      </li>
                   </ul>
                </nav>
             </div>
             <div class="header-btn">
                <a style="background-color: #2C2D83" href="booking.html" class="round-btn">Book Now</a>
             </div>
          </div>
       </div>
    </div>
    <div class="mobile-menu-container"></div>
 </header>
