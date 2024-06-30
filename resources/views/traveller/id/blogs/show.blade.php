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
          <div class="inner-baner-container" style="background-image: url({{ asset($blog->featured_image) }});">
             <div class="container">
                <div class="inner-banner-content">
                   <h1 class="font-bold text-white text-[32px]">{{ $blog->title }}</h1>
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
                         {{-- <span class="byline">
                            <a href="blog-archive.html">Demoteam</a>
                         </span> --}}
                         <span class="posted-on">
                            <?php $date = new DateTime($blog->created_at); ?>
                            <a href="blog-archive.html">{{ $date->format('F j, Y') }}</a>
                         </span>
                         {{-- <span class="comments-link">
                            <a href="#commentArea">No Comments</a>
                         </span> --}}
                      </div>
                      <article class="single-content-wrap">
                        {!! $blog->content !!}
                    </article>
                      <div class="meta-wrap">
                         <div class="tag-links">
                            <a href="#">{{ $blog->category ? $blog->category->category_name : "" }}</a>
                         </div>
                      </div>
                      <!-- blog post item html end -->
                   </div>
                   <div class="col-lg-4 secondary">
                      <div class="sidebar">
                         <aside class="widget widget_latest_post widget-post-thumb">
                            <h3 class="widget-title">Blog Terbaru</h3>
                            <ul>
                                @foreach ($blogs as $recent_blog)
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
       </div>
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
