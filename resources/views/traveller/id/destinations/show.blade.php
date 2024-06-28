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
    <!-- ***site header html start*** -->
    @include('traveller.partial.header')
    <main id="content" class="site-main">
       <!-- ***Inner Banner html start form here*** -->
       <div class="inner-banner-wrap">
          <div class="inner-baner-container" style="background-image: url({{ asset($destination->destination_image) }});">
             <div class="container">
                <div class="inner-banner-content">
                   <h1 class="font-bold text-white text-[32px]">{{ $destination->name }}</h1>
                </div>
             </div>
          </div>
       </div>
       <!-- ***Inner Banner html end here*** -->
       <div class="single-post-section">
          <div class="single-post-inner">
             <div class="container">
                <div class="row">
                   <div class="col-lg-8 primary right-sidebar">
                      <!-- single blog post html start -->
                      <figure class="feature-image">
                         <img src="assets/images/img27.jpg" alt="">
                      </figure>
                      <div class="entry-meta">
                      </div>
                      <article class="single-content-wrap">
                        {!! $destination->description !!}
                    </article>
                      <!-- blog post item html end -->
                   </div>
                   <div class="col-lg-4 secondary">
                      <div class="sidebar">
                         <aside class="widget widget_latest_post widget-post-thumb">
                            <h3 class="widget-title">Lihat destinasi lain yuk</h3>
                            <ul>
                                @foreach ($destinations as $item)
                               <li>
                                  <figure class="post-thumb">
                                     <a href="{{ route('destinations.detail', ['id' => $item->id]) }}"><img src="{{ asset($item->destination_image) }}" alt=""></a>
                                  </figure>
                                  <div class="post-content">
                                     <h5>
                                        <a href="{{ route('destinations.detail', ['id' => $item->id]) }}">{{ $item->name }}</a>
                                     </h5>
                                  </div>
                               </li>
                               @endforeach
                            </ul>
                         </aside>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
