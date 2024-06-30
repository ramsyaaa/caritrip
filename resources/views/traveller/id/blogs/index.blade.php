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
            <div class="">
                <div class="relative w-full">
                    <img class="w-full h-[500px] md:h-[400px] object-cover" src="@isset($meta_page_banner_image) @if($meta_page_banner_image != null) {{ asset($meta_page_banner_image) }} @else {{ asset('assets/images/landscape 3.jpg') }} @endif @else {{ asset('assets/images/landscape 3.jpg') }} @endisset" alt="">
                    <div class="flex items-center justify-center w-full h-full absolute top-0 left-0">
                    <h1 class="font-bold text-white text-[32px]">Semua Blog</h1>
                    </div>
                </div>
            </div>

        </div>
       <!-- ***Inner Banner html end here*** -->
       <div class="archive-section blog-archive">
          <div class="container">
             <div class="row">
                <div class="col-lg-8 primary right-sidebar">
                   <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach ($blogs as $blog)
                            <div class="w-full">
                                <article class="post bg-white shadow rounded-lg overflow-hidden">
                                    <figure class="featured-post">
                                        <img src="{{ $blog->featured_image }}" alt="" class="w-full">
                                    </figure>
                                    <div class="post-content p-4">
                                        <div class="cat-meta mb-2">
                                            <a class="text-gray-500">{{ $blog->category ? $blog->category->category_name : '' }}</a>
                                        </div>
                                        <h3 class="font-bold text-lg mb-4">
                                            <a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                        </h3>
                                        <p class="line-clamp-2 mb-4">{{ strip_tags($blog->content) }}</p>
                                        <div class="post-footer flex justify-between items-center">
                                            <div class="post-btn">
                                                <a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}" class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-4 secondary">
                   <div class="sidebar">
                      <aside class="widget widget_latest_post widget-post-thumb">
                         <h3 class="widget-title">Blog Terbaru</h3>
                         <ul>
                            @foreach ($latest_blogs as $recent_blog)
                               <li>
                                  <figure class="post-thumb">
                                     <a href="{{ route('blogs.show', ['slug' => $recent_blog->slug]) }}"><img src="{{ asset($recent_blog->featured_image) }}" alt=""></a>
                                  </figure>
                                  <div class="post-content">
                                     <h5>
                                        <a href="{{ route('blogs.show', ['slug' => $recent_blog->slug]) }}">{{ $recent_blog->title }}</a>
                                     </h5>
                                     <p class="truncate">{{ strip_tags($recent_blog->content) }}</p>
                                     <div class="entry-meta">
                                        <span class="posted-on">
                                            <?php $date = new DateTime($recent_blog->created_at); ?>
                                           <a href="{{ route('blogs.show', ['slug' => $recent_blog->slug]) }}">{{ $date->format('F j, Y') }}</a>
                                        </span>
                                     </div>
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
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
