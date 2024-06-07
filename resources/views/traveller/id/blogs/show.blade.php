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
                      {{-- <div class="author-wrap">
                         <div class="author-thumb">
                            <img src="assets/images/user-img.png" alt="">
                         </div>
                         <div class="author-content">
                            <h3 class="author-name">Demoteam</h3>
                            <p>Anim eligendi error magnis. Pretium fugiat cubilia ullamcorper adipisci, lobortis repellendus sit culpa maiores!</p>
                            <a href="blog-archive.html" class="button-text">View All Posts > </a>
                         </div>
                      </div> --}}
                      <!-- post comment html -->
                      {{-- <div id="commentArea" class="comment-area">
                         <h3 class="comment-title">3 Comments</h3>
                         <div class="comment-area-inner">
                            <ol>
                               <li>
                                  <figure class="comment-thumb">
                                     <img src="assets/images/img18.jpg" alt="">
                                  </figure>
                                  <div class="comment-content">
                                     <div class="comment-header">
                                        <h5 class="author-name">WILLIAM WRIGHT</h5>
                                        <span class="post-on">March 10 2022</span>
                                     </div>
                                     <p>Fames tincidunt diamlorem tristique accumsan nulla, sem. Voluptatibus doloremque, luctus.</p>
                                     <a href="#replyForm" class="reply"><i class="fas fa-reply"></i>Reply</a>
                                  </div>
                               </li>
                               <li>
                                  <ol>
                                     <li>
                                        <figure class="comment-thumb">
                                           <img src="assets/images/img19.jpg" alt="">
                                        </figure>
                                        <div class="comment-content">
                                           <div class="comment-header">
                                              <h5 class="author-name">ALISON WHITE</h5>
                                              <span class="post-on">March 10 2022</span>
                                           </div>
                                           <p>Fames tincidunt diamlorem tristique accumsan nulla, sem. Voluptatibus doloremque, luctus.</p>
                                           <a href="#replyForm" class="reply"><i class="fas fa-reply"></i>Reply</a>
                                        </div>
                                     </li>
                                  </ol>
                               </li>
                            </ol>
                         </div>
                         <div id="replyForm" class="comment-form-wrap">
                            <h3 class="comment-title">Leave a Reply</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form class="comment-form">
                               <p class="full-width">
                                  <label>Comment</label>
                                  <textarea rows="9"></textarea>
                               </p>
                               <p>
                                  <label>Name *</label>
                                  <input type="text" name="name">
                               </p>
                               <p>
                                  <label>Email *</label>
                                  <input type="email" name="email">
                               </p>
                               <p>
                                  <label>Website</label>
                                  <input type="text" name="web">
                               </p>
                               <p>
                                  <label>
                                     <input type="checkbox" name="s">
                                     Save my name, email, and website in this browser for the next time I comment.
                                  </label>
                               </p>
                               <p class="full-width">
                                  <input type="submit" name="submit" value="Post comment">
                               </p>
                            </form>
                         </div>
                         <!-- post navigation html -->
                         <div class="post-navigation">
                            <div class="nav-prev">
                               <a href="blog-single.html">
                                  <span class="nav-label">Previous</span>
                                  <span class="nav-title">A Sample of a BlockQuote</span>
                               </a>
                            </div>
                            <div class="nav-next">
                               <a href="blog-single.html">
                                  <span class="nav-label">Next</span>
                                  <span class="nav-title">Blog Can Be Everything Nowadays.</span>
                               </a>
                            </div>
                         </div>
                      </div> --}}
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
                                @foreach ($blogs as $recent_blog)
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
       </div>
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
