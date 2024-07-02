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
    @include('traveller.partial.header')
    <main id="content" class="site-main">
       <section class="contact-inner-page">
          <!-- ***Inner Banner html start form here*** -->
          <div class="inner-banner-wrap">
            <div class="">
                <div class="relative w-full">
                    <img class="w-full h-[500px] md:h-[400px] object-cover" src="@isset($meta_page_banner_image) @if($meta_page_banner_image != null) {{ asset($meta_page_banner_image) }} @else {{ asset('assets/images/landscape 3.jpg') }} @endif @else {{ asset('assets/images/landscape 3.jpg') }} @endisset" alt="">
                    <div class="flex items-center justify-center w-full h-full absolute top-0 left-0">
                    <h1 class="font-bold text-white text-[32px]">Kontak</h1>
                    </div>
                </div>
            </div>

        </div>
          <!-- ***Inner Banner html end here*** -->
          <!-- ***contact section html start form here*** -->
          <div class="inner-contact-wrap">
             <div class="container">
                <div class="row flex justify-center">
                   <div class="col-lg-6">
                      <div class="section-heading">
                         <h5 class="sub-title">GET IN TOUCH</h5>
                         <h2 class="section-title">HUBUNGI KAMI!</h2>
                         <p>CariTrip siap membantu Anda merencanakan perjalanan impian, baik wisata bahari dengan kapal maupun darat ke berbagai destinasi domestik dan internasional. Tim profesional kami siap menjawab pertanyaan Anda, memberikan saran, dan membantu Anda memesan perjalanan yang sesuai dengan kebutuhan dan anggaran Anda.</p>
                         <div class="social-icon mt-4">
                            <ul>
                               <li>
                                  <a href="https://www.tiktok.com/@cari_trip?is_from_webapp=1&sender_device=pc" style="background-color: #2C2D83" target="_blank">
                                     <i class="fab fa-tiktok" aria-hidden="true"></i>
                                  </a>
                               </li>
                               <li>
                                    <a href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan yang tersedia." style="background-color: #2C2D83" target="_blank">
                                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                </li>
                               <li>
                                  <a href="https://www.instagram.com/caritrip.id/?utm_source=ig_web_button_share_sheet" style="background-color: #2C2D83" target="_blank">
                                     <i class="fab fa-instagram" aria-hidden="true"></i>
                                  </a>
                               </li>
                               <li>
                                    <a style="background-color: #2C2D83" href="mailto:admincaritrip@gmail.com?subject=Caritrip Asking&body=Hello, I am from the Caritrip website and am interested in your trip package. Could you please provide more details about it?.">
                                        <i class="icon icon-envelope1" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                         </div>
                      </div>
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63144.207509148444!2d119.82302755697172!3d-8.449391897086624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db468a6d47ed641%3A0x87f524333c6a6e8d!2sLabuan%20Bajo%2C%20Kec.%20Komodo%2C%20Kabupaten%20Manggarai%20Barat%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1719914305650!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***contact section html start form here*** -->
          <!-- ***iconbox section html start form here*** -->
          <div class="contact-details-section bg-light-grey">
             <div class="container">
                <div class="row align-items-center">
                   <div class="col-lg-4">
                      <div class="icon-box border-icon-box">
                         <div class="box-icon" style="background-color: #2C2D83">
                            <i aria-hidden="true" class="fas fa-envelope-open-text"></i>
                         </div>
                         <div class="icon-box-content">
                            <h4>ALAMAT EMAIL</h4>
                            <ul>
                               <li>
                                  <a href="mailto:info@domain.com">admin@caritrip.id</a>
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div class="icon-box border-icon-box">
                         <div class="box-icon" style="background-color: #2C2D83">
                            <i aria-hidden="true" class="fas fa-phone-alt"></i>
                         </div>
                         <div class="icon-box-content">
                            <h4>NOMOR PONSEL</h4>
                            <ul>
                               <li>
                                  <a href="https://wa.me/+6282236792273?text=Hai, saya tertarik dengan Cari Trip. Saya ingin bertanya tentang perjalanan yang tersedia." target="_blank">+62 822 3679 2273</a>
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="col-lg-4">
                      <div class="icon-box border-icon-box">
                         <div class="box-icon" style="background-color: #2C2D83">
                            <i aria-hidden="true" class="fas fa-map-marker-alt"></i>
                         </div>
                         <div class="icon-box-content">
                            <h4>LOKASI</h4>
                            <ul>
                               <li>
                                    Labuan Bajo
                               </li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- ***iconbox section html end here*** -->
       </section>
    </main>
    @include('traveller.partial.footer')
 </div>
@endsection
