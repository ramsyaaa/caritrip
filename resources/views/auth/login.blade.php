

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title data-setting="app_name" data-rightjoin=" Pro | Responsive Bootstrap 5 Admin Dashboard Template">Login CRM</title>
      <meta name="DC.title" content="Login CRM">
      <!-- Google Font Api KEY-->
      <meta name="google_font_api" content="AIzaSyBG58yNdAjc20_8jAvLNSVi9E4Xhwjau_k">
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('vendor/dashboard')}}/assets/images/favicon.ico">
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/core/libs.min.css">
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/hope-ui.min.css?v=4.0.0">
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/pro.min.css?v=4.0.0">
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/custom.min.css?v=4.0.0">
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/dark.min.css?v=4.0.0">
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/customizer.min.css?v=4.0.0">
      <!-- RTL Css -->
      <link rel="stylesheet" href="{{asset('vendor/dashboard')}}/assets/css/rtl.min.css?v=4.0.0">
      <!-- Google Font -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
      <link href="{{asset('vendor/dashboard')}}/{{asset('vendor/dashboard')}}/../css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body">
              <img src="{{asset('vendor/dashboard')}}/assets/images/loader.webp" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
          </div>
      </div>
    </div>
    <!-- loader END -->
    <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white h-100">
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card iq-auth-form">
                        <div class="card-body">
                           <a href="../index.html" class="navbar-brand d-flex align-items-center mb-3">
                              
                              <!--Logo start-->
                              {{-- <div class="logo-main">
                                  <div class="logo-normal">
                                      <img src="{{asset('logo.png')}}" style="width: 165px;">
                                  </div>
                                  <div class="logo-mini">
                                      <img src="{{asset('logo.png')}}" style="width: 165px;">
                                  </div>
                              </div> --}}
                              <!--logo End-->                              
                              <h4 class="logo-title ms-3 mb-0" data-setting="app_name">Cari Trip</h4>
                           </a>
                           <h2 class="mb-2 text-center">Sign In</h2>
                           <form method="post" action="{{route('auth.submit')}}">
                            {{ csrf_field() }}
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" name="email" aria-describedby="email" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control" name="password" aria-describedby="password" placeholder=" ">
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign In</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg">
                  <svg width="280" height="230" viewbox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"></rect>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"></rect>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"></rect>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"></rect>
                     </g>
                  </svg>
               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 vh-100 overflow-hidden">
               <img src="{{asset('vendor/dashboard')}}/assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images" loading="lazy">
            </div>
         </div>
      </section>
    </div>
    <!-- Library Bundle Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/core/libs.min.js"></script>
    <script src="{{asset('vendor/dashboard')}}/assets/js/plugins/slider-tabs.js"></script>
    <!-- Lodash Utility -->
    <script src="{{asset('vendor/dashboard')}}/assets/vendor/lodash/lodash.min.js"></script>
    <!-- Utilities Functions -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/iqonic-script/utility.min.js"></script>
    <!-- Settings Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/iqonic-script/setting.min.js"></script>
    <!-- Settings Init Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/setting-init.js"></script>
    <!-- External Library Bundle Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/core/external.min.js"></script>
    <!-- Widgetchart Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/charts/widgetcharts.js?v=4.0.0" defer=""></script>
    <!-- Dashboard Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/charts/dashboard.js?v=4.0.0" defer=""></script>
    <script src="{{asset('vendor/dashboard')}}/assets/js/charts/alternate-dashboard.js?v=4.0.0" defer=""></script>
    <!-- Hopeui Script -->
    <script src="{{asset('vendor/dashboard')}}/assets/js/hope-ui.js?v=4.0.0" defer=""></script>
    <script src="{{asset('vendor/dashboard')}}/assets/js/hope-uipro.js?v=4.0.0" defer=""></script>
    <script src="{{asset('vendor/dashboard')}}/assets/js/sidebar.js?v=4.0.0" defer=""></script>  </body>
</html>
