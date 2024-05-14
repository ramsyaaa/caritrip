<!doctype html>
<html lang="en" dir="ltr">
   @include('admin.partials.head') 
   <body class="">
      @include('admin.partials.preloader')
      @include('admin.partials.navbar')
      <main class="main-content">
         <div class="position-relative ">
            @include('admin.partials.header')
            @yield('breadcrumbs')
         </div>
         @yield('content')
         @include('admin.partials.footer')
      </main>
      @include('admin.partials.scripts')
   </body>
</html>
