<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta property="og:title" content="@isset($meta_page_breadcrumbs_title) @if($meta_page_breadcrumbs_title != null){{  $meta_page_breadcrumbs_title }} @else CariTrip @endif @else Caritrip @endisset">
        <meta property="og:description" content="@isset($meta_page_description) @if($meta_page_description != null) {{ $meta_page_description }} @else CariTrip @endif @endisset">
        <meta property="og:image" content="@isset($meta_page_og_image) @if($meta_page_og_image != null) {{ asset($meta_page_og_image) }} @else {{ asset('assets/logos/caritrip.png') }} @endif @endisset">
        <meta property="og:url" content="https://caritrip.com">
        <meta property="og:type" content="website">
        <meta name="keywords" content="@isset($meta_page_keywords) @if($meta_page_keywords != null) {{ $meta_page_keywords }} @else CariTrip @endif @endisset">

        <!-- favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/logos/IMG_0859.PNG') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('vendor/landing/assets/vendors/bootstrap/css/bootstrap.min.css') }}" media="all">
        <!-- jquery-ui css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/assets/vendors/jquery-ui/jquery-ui.min.css') }}">
        <!-- fancybox box css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/assets/vendors/fancybox/dist/jquery.fancybox.min.css') }}">
        <!-- Fonts Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/assets/vendors/fontawesome/css/all.min.css') }}">
        <!-- Elmentkit Icon CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/assets/vendors/elementskit-icon-pack/assets/css/ekiticons.css') }}">
        <!-- slick slider css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/assets/vendors/slick/slick.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/assets/vendors/slick/slick-theme.css') }}">
        <!-- google fonts -->
        <link href="../../css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/landing/style.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>@isset($page_title) {{ $page_title }} @else Caritrip @endisset</title>

        <script src="//unpkg.com/alpinejs" defer></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Fredoka', sans-serif !important;
            }
            .hide-scrollbar {
                -ms-overflow-style: none;  /* Internet Explorer 10+ */
                scrollbar-width: none;  /* Firefox */
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none;  /* Chrome, Safari, and Edge */
            }
            .slider img {
                display: none;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .slider img.active {
                display: block;
            }

            .slider .prev,
            .slider .next {
                cursor: pointer;
            }
        </style>

     </head>
   <body class="home">
      <main class="">
         @yield('content')
      </main>
       <!-- JavaScript -->
 <script src="{{ asset('vendor/landing/assets/vendors/jquery/jquery.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/waypoint/waypoints.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/countdown-date-loop-counter/loopcounter.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/counterup/jquery.counterup.min.js') }}"></script>
 <script src="../../imagesloaded%404.1.4/imagesloaded.pkgd.min.js"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/masonry/masonry.pkgd.min.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/slick/slick.min.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/fancybox/dist/jquery.fancybox.min.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/vendors/slick-nav/jquery.slicknav.js') }}"></script>
 <script src="{{ asset('vendor/landing/assets/js/custom.min.js') }}"></script>

   </body>
</html>
