<aside class="sidebar sidebar-base sidebar-color" id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
   <div class="sidebar-header d-flex align-items-center justify-content-start" style="background-color:white !important;">
      <a href="/" class="navbar-brand">
         <!--Logo start-->
         <div class="logo-main">
            <div class="logo-normal">
               <img src="{{ asset('assets/logos/caritrip.png') }}" style="width: 165px;">
            </div>
            <div class="logo-mini">
               <img src="{{ asset('assets/logos/caritrip.png') }}" style="width: 165px;">
            </div>
         </div>
         <!--logo End-->
      </a>
      {{-- <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
         <i class="icon">
            <svg class="icon-20" width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
               <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
         </i>
      </div> --}}
   </div>
   <div class="sidebar-body pt-0 data-scrollbar">
      <div class="sidebar-list">
         <!-- Sidebar Menu Start -->
         <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
            <li class="nav-item static-item">
               <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
               <span class="default-icon">Beranda</span>
               <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link @if (request()->is('admin') || request()->is('admin')) active @endif" aria-current="page" href="{{url('admin')}}">
                  <i class="icon" data-bs-toggle="tooltip" title="Dashboard" data-bs-placement="right">
                     <svg width="20" class="icon-20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                     </svg>
                  </i>
                  <span class="item-name">Dashboard</span>
               </a>
            </li>
            <li>
               <hr class="hr-horizontal">
            </li>
            <li class="nav-item static-item">
               <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
               <span class="default-icon">Master Data</span>
               <span class="mini-icon">-</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link @if (request()->is('admin/users') || request()->is('admin/users/*')) active @endif" aria-current="users" href="{{url('admin/users')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>

                  <span class="item-name">Users</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link @if (request()->is('admin/language') || request()->is('admin/language/*')) active @endif" aria-current="language" href="{{url('admin/language')}}">
                  <i class="icon" data-bs-toggle="tooltip" title="Language" data-bs-placement="right">
                      <svg width="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M28,35.5a2,2,0,1,0,0-4,13.43052,13.43052,0,0,1-5.69482-1.17908A19.09386,19.09386,0,0,0,26.60339,22.5H28a2,2,0,0,0,0-4H21v-2a2,2,0,1,0-4,0v2H10a2,2,0,0,0,0,4H22.396a14.81827,14.81827,0,0,1-3.38532,5.50268,13.93046,13.93046,0,0,1-2.48724-3.425,1.99983,1.99983,0,1,0-3.54883,1.84473,18.53078,18.53078,0,0,0,2.695,3.908A13.33728,13.33728,0,0,1,10,31.5a2,2,0,0,0,0,4,16.74023,16.74023,0,0,0,8.96918-2.40607A16.7175,16.7175,0,0,0,28,35.5Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M62,20.5H42a2,2,0,0,0,0,4H60v29H31.44617l6.29016-11.00781A2.31134,2.31134,0,0,0,38,41.5V8.5a2.0001,2.0001,0,0,0-2-2H2a2.0001,2.0001,0,0,0-2,2v33a2.0001,2.0001,0,0,0,2,2H26v12a2.03222,2.03222,0,0,0,2.00177,2H62a2.0001,2.0001,0,0,0,2-2v-33A2.0001,2.0001,0,0,0,62,20.5ZM4,10.5H34v29H4Zm28.55383,33L30,47.96923V43.5Z" fill="currentColor"></path>
                        <path d="M42,40.5v7a2,2,0,0,0,4,0v-2h6v2a2,2,0,0,0,4,0v-7a7,7,0,0,0-14,0Zm7-3a3.00328,3.00328,0,0,1,3,3v1H46v-1A3.00328,3.00328,0,0,1,49,37.5Z" fill="currentColor"></path>
                        <circle cx="49" cy="29.5" r="2" fill="currentColor"></circle>
                     </svg>
                  </i>
                  <span class="item-name">Bahasa</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link @if (request()->is('admin/page') || request()->is('admin/page/*')) active @endif" aria-current="page" href="{{url('admin/page')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V20a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H4a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V4a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09a1.65 1.65 0 0 0 1.51 1H20a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>

                  <span class="item-name">Setting Halaman</span>
               </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/blog') || request()->is('admin/blog/*')) active @endif" aria-current="blog" href="{{url('admin/blog')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book">
                        <path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"></path>
                        <path d="M20 2H6.5A2.5 2.5 0 0 0 4 4.5v15"></path>
                        <path d="M20 2v20"></path>
                        <path d="M16 2v20"></path>
                    </svg>

                   <span class="item-name">Blog</span>
                </a>
             </li>
             <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/blog-category') || request()->is('admin/blog-category/*')) active @endif" aria-current="blog-category" href="{{url('admin/blog-category')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers">
                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                        <polyline points="2 17 12 22 22 17"></polyline>
                        <polyline points="2 12 12 17 22 12"></polyline>
                    </svg>

                   <span class="item-name">Kategori Blog</span>
                </a>
             </li>
             <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/countries') || request()->is('admin/countries/*')) active @endif" aria-current="countries" href="{{url('admin/countries')}}">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10c0 4-1.5 7.7-4 10"></path>
                        <path d="M12 2a15.3 15.3 0 0 0-4 10c0 4 1.5 7.7 4 10"></path>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                    </svg>
                   <span class="item-name">Negara</span>
                </a>
             </li>
             <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/destination') || request()->is('admin/destination/*')) active @endif" aria-current="destination" href="{{url('admin/destination')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                        <path d="M21 10c0 7.5-9 13-9 13S3 17.5 3 10a9 9 0 1 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                   <span class="item-name">Destinasi</span>
                </a>
             </li>
            <li class="nav-item">
               <a class="nav-link @if (request()->is('admin/boat') || request()->is('admin/boat/*')) active @endif" aria-current="boat" href="{{url('admin/boat')}}">
                  <i class="icon" data-bs-toggle="tooltip" title="Boat" data-bs-placement="right">
                      <svg width="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h48v48H0z"></path>
                        <path opacity="0.4" d="M40 42c-2.78 0-5.56-.94-8-2.65-4.88 3.42-11.12 3.42-16 0C13.56 41.06 10.78 42 8 42H4v4h4c2.75 0 5.48-.69 8-1.99a17.445 17.445 0 0 0 16 0C34.52 45.3 37.25 46 40 46h4v-4h-4zM7.89 38H8c3.2 0 6.05-1.76 8-4 1.95 2.24 4.8 4 8 4s6.05-1.76 8-4c1.96 2.24 4.79 4 8 4h.11l3.79-13.37c.17-.51.12-1.07-.12-1.55-.25-.48-.68-.84-1.2-.99L40 21.24V12c0-2.21-1.79-4-4-4h-6V2H18v6h-6c-2.21 0-4 1.79-4 4v9.24l-2.57.84c-.52.16-.95.51-1.2.99s-.29 1.04-.12 1.55L7.89 38zM12 12h24v7.93L24 16l-12 3.93V12z" fill="currentColor"></path>
                     </svg>
                  </i>
                  <span class="item-name">Kapal</span>
               </a>
            </li>
             <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/boat-travel-package') || request()->is('admin/boat-travel-package/*')) active @endif" aria-current="boat-travel-package" href="{{url('admin/boat-travel-package')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-anchor">
                    <circle cx="12" cy="5" r="3"></circle>
                    <line x1="12" y1="22" x2="12" y2="8"></line>
                    <path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>
                </svg>

                   <span class="item-name">Paket Kapal</span>
                </a>
             </li>
             <li class="nav-item">
                <a class="nav-link @if (request()->is('admin/travel-package') || request()->is('admin/travel-package/*')) active @endif" aria-current="travel-package" href="{{url('admin/travel-package')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 3H8a2 2 0 0 0-2 2v2h12V5a2 2 0 0 0-2-2z"></path>
                </svg>

                   <span class="item-name">Paket Travel</span>
                </a>
             </li>
            <li>
               <hr class="hr-horizontal">
            </li>
         </ul>
         <!-- Sidebar Menu End -->
      </div>
   </div>
   <div class="sidebar-footer"></div>
</aside>
