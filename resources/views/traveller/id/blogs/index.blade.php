@extends('traveller.layout.master')

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
          <div class="inner-baner-container" style="background-image: url({{ asset('vendor/landing/assets/images/img7.jpg') }});">
             <div class="container">
                <div class="inner-banner-content">
                   <h1 class="font-bold text-white text-[32px]">All Blog</h1>
                </div>
             </div>
          </div>
       </div>
       <!-- ***Inner Banner html end here*** -->
       <div class="archive-section blog-archive">
          <div class="container">
             <div class="row">
                <div class="col-lg-8 primary right-sidebar">
                   <!-- blog post item html start -->
                   <div class="grid blog-inner row">
                    @foreach ($blogs as $blog)
                      <div class="grid-item col-md-6">
                         <article class="post">
                            <figure class="featured-post">
                               <img src="{{ $blog->featured_image }}" alt="">
                            </figure>
                            <div class="post-content">
                               <div class="cat-meta">
                                  <a>{{ $blog->category ? $blog->category->category_name : '' }}</a>
                               </div>
                               <h3 class="font-bold text-[16px] mb-4"><a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                               {{-- <p>Laboris hac erat dolor, posuere volutpat fringilla gravida metus nonummy, blandit mi...</p> --}}
                               <div class="post-footer d-flex justify-content-between align-items-center">
                                  <div class="post-btn">
                                     <a href="{{ route('blogs.show', ['slug' => $blog->slug]) }}" class="round-btn">Read More</a>
                                  </div>
                                  {{-- <div class="meta-comment">
                                     <a href="blog-archive.html">
                                        <i aria-hidden="true" class="fas fa-comment"></i>
                                        <span>0</span>
                                     </a>
                                  </div> --}}
                               </div>
                            </div>
                         </article>
                      </div>
                      @endforeach
                   </div>
                   <!-- blog post item html end -->
                </div>
                <div class="col-lg-4 secondary">
                   <div class="sidebar">
                      {{-- <aside class="widget author_widget">
                         <h3 class="widget-title">ABOUT AUTHOR</h3>
                         <div class="widget-content text-center">
                            <div class="profile">
                               <figure class="avatar">
                                  <a href="#">
                                     <img src="assets/images/img20.jpg" alt="">
                                  </a>
                               </figure>
                               <div class="text-content">
                                  <div class="name-title">
                                     <h4>
                                        <a href="#">James Watson</a>
                                     </h4>
                                  </div>
                                  <p>Accumsan? Aliquet nobis doloremque, aliqua? Inceptos voluptatem, duis tempore optio quae animi viverra distinctio cumque vivamus, earum congue, anim velit</p>
                               </div>
                               <div class="socialgroup">
                                  <ul>
                                     <li>
                                        <a target="_blank" href="https://www.facebook.com/">
                                           <i class="fab fa-facebook"></i>
                                        </a>
                                     </li>
                                     <li>
                                        <a target="_blank" href="https://www.google.com/">
                                           <i class="fab fa-google"></i>
                                        </a>
                                     </li>
                                     <li>
                                        <a target="_blank" href="https://www.twitter.com/">
                                           <i class="fab fa-twitter"></i>
                                        </a>
                                     </li>
                                     <li>
                                        <a target="_blank" href="https://www.instagram.com/">
                                           <i class="fab fa-instagram"></i>
                                        </a>
                                     </li>
                                     <li>
                                        <a target="_blank" href="https://www.pinterest.com/">
                                           <i class="fab fa-pinterest"></i>
                                        </a>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                      </aside> --}}
                      <aside class="widget widget_latest_post widget-post-thumb">
                         <h3 class="widget-title">Recent Post</h3>
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
                                     <div class="entry-meta">
                                        <span class="posted-on">
                                            <?php $date = new DateTime($recent_blog->created_at); ?>
                                           <a href="{{ route('blogs.show', ['slug' => $recent_blog->slug]) }}">{{ $date->format('F j, Y') }}</a>
                                        </span>
                                        {{-- <span class="comments-link">
                                           <a>No Comments</a>
                                        </span> --}}
                                     </div>
                                  </div>
                               </li>
                               @endforeach
                         </ul>
                      </aside>
                      {{-- <aside class="widget widget_adds">
                         <figure>
                            <img src="assets/images/add-banner.jpg">
                         </figure>
                      </aside> --}}
                      {{-- <aside class="widget widget_category">
                         <h3 class="widget-title">Categories</h3>
                         <ul>
                            <li>
                               <i aria-hidden="true" class="fas fa-dot-circle"></i>
                               <a href="#">CULTURE</a>
                               <span>(3)</span>
                            </li>
                            <li>
                               <i aria-hidden="true" class="fas fa-dot-circle"></i>
                               <a href="#">DESIGN</a>
                               <span>(5)</span>
                            </li>
                            <li>
                               <i aria-hidden="true" class="fas fa-dot-circle"></i>
                               <a href="#">POPULAR</a>
                               <span>(2)</span>
                            </li>
                            <li>
                               <i aria-hidden="true" class="fas fa-dot-circle"></i>
                               <a href="#">SLIDER</a>
                               <span>(5)</span>
                            </li>
                            <li>
                               <i aria-hidden="true" class="fas fa-dot-circle"></i>
                               <a href="#">TECH</a>
                               <span>(1)</span>
                            </li>
                         </ul>
                      </aside> --}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
