<aside class="sidebar sidebar-base sidebar-color" id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
   <div class="sidebar-header d-flex align-items-center justify-content-start" style="background-color:white !important;">
      <a href="index.html" class="navbar-brand">
         <!--Logo start-->
         <div class="logo-main">
            <div class="logo-normal">
               <img src="{{asset('logo.png')}}" style="width: 165px;">
            </div>
            <div class="logo-mini">
               <img src="{{asset('logo.png')}}" style="width: 165px;">
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
               <span class="default-icon">Home</span>
               <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="{{url('admin/dashboard')}}">
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
               <a class="nav-link" aria-current="language" href="{{url('admin/language')}}">
                  <i class="icon" data-bs-toggle="tooltip" title="Language" data-bs-placement="right">
                      <svg width="32" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M28,35.5a2,2,0,1,0,0-4,13.43052,13.43052,0,0,1-5.69482-1.17908A19.09386,19.09386,0,0,0,26.60339,22.5H28a2,2,0,0,0,0-4H21v-2a2,2,0,1,0-4,0v2H10a2,2,0,0,0,0,4H22.396a14.81827,14.81827,0,0,1-3.38532,5.50268,13.93046,13.93046,0,0,1-2.48724-3.425,1.99983,1.99983,0,1,0-3.54883,1.84473,18.53078,18.53078,0,0,0,2.695,3.908A13.33728,13.33728,0,0,1,10,31.5a2,2,0,0,0,0,4,16.74023,16.74023,0,0,0,8.96918-2.40607A16.7175,16.7175,0,0,0,28,35.5Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M62,20.5H42a2,2,0,0,0,0,4H60v29H31.44617l6.29016-11.00781A2.31134,2.31134,0,0,0,38,41.5V8.5a2.0001,2.0001,0,0,0-2-2H2a2.0001,2.0001,0,0,0-2,2v33a2.0001,2.0001,0,0,0,2,2H26v12a2.03222,2.03222,0,0,0,2.00177,2H62a2.0001,2.0001,0,0,0,2-2v-33A2.0001,2.0001,0,0,0,62,20.5ZM4,10.5H34v29H4Zm28.55383,33L30,47.96923V43.5Z" fill="currentColor"></path>
                        <path d="M42,40.5v7a2,2,0,0,0,4,0v-2h6v2a2,2,0,0,0,4,0v-7a7,7,0,0,0-14,0Zm7-3a3.00328,3.00328,0,0,1,3,3v1H46v-1A3.00328,3.00328,0,0,1,49,37.5Z" fill="currentColor"></path>
                        <circle cx="49" cy="29.5" r="2" fill="currentColor"></circle>
                     </svg>
                  </i>
                  <span class="item-name">Language</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" aria-current="page" href="{{url('admin/page')}}">
                  <i class="icon" data-bs-toggle="tooltip" title="Page" data-bs-placement="right">
                      <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                     </svg>
                  </i>
                  <span class="item-name">Page</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" aria-current="boat" href="{{url('admin/boat')}}">
                  <i class="icon" data-bs-toggle="tooltip" title="Boat" data-bs-placement="right">
                      <svg width="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h48v48H0z"></path>
                        <path opacity="0.4" d="M40 42c-2.78 0-5.56-.94-8-2.65-4.88 3.42-11.12 3.42-16 0C13.56 41.06 10.78 42 8 42H4v4h4c2.75 0 5.48-.69 8-1.99a17.445 17.445 0 0 0 16 0C34.52 45.3 37.25 46 40 46h4v-4h-4zM7.89 38H8c3.2 0 6.05-1.76 8-4 1.95 2.24 4.8 4 8 4s6.05-1.76 8-4c1.96 2.24 4.79 4 8 4h.11l3.79-13.37c.17-.51.12-1.07-.12-1.55-.25-.48-.68-.84-1.2-.99L40 21.24V12c0-2.21-1.79-4-4-4h-6V2H18v6h-6c-2.21 0-4 1.79-4 4v9.24l-2.57.84c-.52.16-.95.51-1.2.99s-.29 1.04-.12 1.55L7.89 38zM12 12h24v7.93L24 16l-12 3.93V12z" fill="currentColor"></path>
                     </svg>
                  </i>
                  <span class="item-name">Boat</span>
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
