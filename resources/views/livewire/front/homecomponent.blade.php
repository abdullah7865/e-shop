<div>
    <!-- slideshow start -->
    <div class="slideshow-section position-relative">
        <div class="slideshow-active activate-slider"
            data-slick='{
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "dots": true,
                    "arrows": true,
                    "responsive": [
                        {
                        "breakpoint": 768,
                        "settings": {
                            "arrows": false
                        }
                        }
                    ]
                }'>
            <div class="slide-item slide-item-bag position-relative">
                <img class="slide-img d-none d-md-block" src="{{ asset('assets/front/img/slideshow/s1.jpg') }}"
                    alt="slide-1">
                <img class="slide-img d-md-none" src="{{ asset('assets/front/img/slideshow/s1-m.jpg') }}" alt="slide-1">
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center">
                        <div class="content-box slide-content py-4">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                ZEN VIVID 16
                            </h2>
                            <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                Look for your inspiration here
                            </p>
                            <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                href="collection-left-sidebar.html"
                                data-animation="animate__animated animate__fadeInUp">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item slide-item-bag position-relative">
                <img class="slide-img d-none d-md-block" src="{{ asset('assets/front/img/slideshow/s2.jpg') }}"
                    alt="slide-2">
                <img class="slide-img d-md-none" src="{{ asset('assets/front/img/slideshow/s2-m.jpg') }}"
                    alt="slide-2">
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center">
                        <div class="content-box slide-content py-4">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                PLEATED HEEL
                            </h2>
                            <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                Look for your inspiration here
                            </p>
                            <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                href="collection-left-sidebar.html"
                                data-animation="animate__animated animate__fadeInUp">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item slide-item-bag position-relative">
                <img class="slide-img d-none d-md-block" src="{{ asset('assets/front/img/slideshow/s3.jpg') }}"
                    alt="slide-3">
                <img class="slide-img d-md-none" src="{{ asset('assets/front/img/slideshow/s3-m.jpg') }}"
                    alt="slide-3">
                <div class="content-absolute content-slide">
                    <div class="container height-inherit d-flex align-items-center">
                        <div class="content-box slide-content py-4">
                            <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                MEN'S SHOES
                            </h2>
                            <p class="slide-subheading heading_18 animate__animated animate__fadeInUp"
                                data-animation="animate__animated animate__fadeInUp">
                                Look for your inspiration here
                            </p>
                            <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                href="collection-left-sidebar.html"
                                data-animation="animate__animated animate__fadeInUp">SHOP
                                NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="activate-arrows"></div>
        <div class="activate-dots dot-tools"></div>
    </div>
    <!-- slideshow end -->

    <!-- trusted badge start -->
    <div class="trusted-section mt-100 overflow-hidden">
        <div class="trusted-section-inner">
            <div class="container">
                <div class="row justify-content-center trusted-row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="trusted-badge bg-trust-1 rounded">
                            <div class="trusted-icon">
                                <img class="icon-trusted" src="{{ asset('assets/front/img/trusted/1.png') }}"
                                    alt="icon-1">
                            </div>
                            <div class="trusted-content">
                                <h2 class="heading_18 trusted-heading">Free Shipping & Return</h2>
                                <p class="text_16 trusted-subheading trusted-subheading-2">On all order over
                                    $99.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="trusted-badge bg-trust-2 rounded">
                            <div class="trusted-icon">
                                <img class="icon-trusted" src="{{ asset('assets/front/img/trusted/2.png') }}"
                                    alt="icon-2">
                            </div>
                            <div class="trusted-content">
                                <h2 class="heading_18 trusted-heading">Customer Support 24/7</h2>
                                <p class="text_16 trusted-subheading trusted-subheading-2">Instant access to
                                    support</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="trusted-badge bg-trust-3 rounded">
                            <div class="trusted-icon">
                                <img class="icon-trusted" src="{{ asset('assets/front/img/trusted/3.png') }}"
                                    alt="icon-3">
                            </div>
                            <div class="trusted-content">
                                <h2 class="heading_18 trusted-heading">100% Secure Payment</h2>
                                <p class="text_16 trusted-subheading trusted-subheading-2">We ensure secure
                                    payment!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- trusted badge end -->

    <!-- collection start -->
    <div class="featured-collection mt-100 overflow-hidden">
        <div class="collection-tab-inner">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-heading">Popular Products</h2>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card">
                                @php
                                    $imageArray = json_decode($product->images, true);
                                    $imagePath = !empty($imageArray) ? $imageArray[0] : 'default.png';
                                @endphp
                                <div class="product-card-img">
                                    <a class="hover-switch" href="collection-left-sidebar.html">
                                        <img class="secondary-img"
                                            src="{{ asset('storage/' . $imagePath) }}"
                                            alt="product-img">
                                        <img class="primary-img"
                                            src="{{ asset('storage/' . $imagePath) }}"
                                            alt="product-img">
                                    </a>

                                    <div class="product-badge">
                                        <span class="badge-label badge-percentage rounded">-{{ $product->discount_percentage }}%</span>
                                    </div>

                                    <div class="product-card-action product-card-action-2 justify-content-center">
                                        <a href="#quickview-modal" class="action-card action-quickview"
                                            data-bs-toggle="modal">
                                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 0C15.5117 0 20 4.48828 20 10C20 12.3945 19.1602 14.5898 17.75 16.3125L25.7188 24.2812L24.2812 25.7188L16.3125 17.75C14.5898 19.1602 12.3945 20 10 20C4.48828 20 0 15.5117 0 10C0 4.48828 4.48828 0 10 0ZM10 2C5.57031 2 2 5.57031 2 10C2 14.4297 5.57031 18 10 18C14.4297 18 18 14.4297 18 10C18 5.57031 14.4297 2 10 2ZM11 6V9H14V11H11V14H9V11H6V9H9V6H11Z"
                                                    fill="#00234D" />
                                            </svg>
                                        </a>
                                        <a href="#" class="action-card action-wishlist">
                                            <i class="fa-regular fa-heart" style="color: #000000;"></i>
                                        </a>

                                        <a href="#" class="action-card action-addtocart">
                                            <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-details">
                                    <ul class="color-lists list-unstyled d-flex align-items-center">
                                        <li><a href="javascript:void(0)" class="color-swatch swatch-black active"></a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="color-swatch swatch-cyan"></a></li>
                                        <li><a href="javascript:void(0)" class="color-swatch swatch-purple"></a>
                                        </li>
                                    </ul>
                                    <h3 class="product-card-title">
                                        <a href="collection-left-sidebar.html">{{$product->name}}</a>
                                    </h3>
                                    <div class="product-card-price">
                                        <span class="card-price-regular">${{ $product->final_price }}</span>
                                        <span class="card-price-compare text-decoration-line-through">${{ $product->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                    <a class="btn-primary" href="{{route ('shop')}}">VIEW ALL</a>
                </div>
            </div>
        </div>
    </div>
    <!-- collection end -->

    <!-- banner start -->
    <div class="banner-section mt-100 overflow-hidden">
        <div class="banner-section-inner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-right" data-aos-duration="1200">
                        <a class="banner-item position-relative rounded" href="collection-left-sidebar.html">
                            <img class="banner-img" src="{{ asset('assets/front/img/banner/shoe-1.jpg') }}"
                                alt="banner-1">
                            <div class="content-absolute content-slide">
                                <div class="container height-inherit d-flex align-items-center">
                                    <div class="content-box banner-content p-4">
                                        <p class="heading_18 mb-3 text-white">Sports Shoes</p>
                                        <h2 class="heading_34 text-white">25% off for <br>sports men</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="1200">
                        <a class="banner-item position-relative rounded" href="collection-left-sidebar.html">
                            <img class="banner-img" src="{{ asset('assets/front/img/banner/shoe-2.jpg') }}"
                                alt="banner-2">
                            <div class="content-absolute content-slide">
                                <div class="container height-inherit d-flex align-items-center">
                                    <div class="content-box banner-content p-4">
                                        <p class="heading_18 mb-3 text-white">Sports Shoes</p>
                                        <h2 class="heading_34 text-white">25% off for <br>sports women</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <livewire:Front.FeaturedCollection />

    <!-- single banner start -->
    <div class="single-banner-section mt-100 overflow-hidden">
        <div class="position-relative overlay">
            <img class="single-banner-img" src="{{ asset('assets/front/img/banner/single-banner.jpg') }}"
                alt="slide-1">

            <div class="content-absolute content-slide">
                <div class="container height-inherit d-flex align-items-center">
                    <div class="content-box single-banner-content py-4">
                        <h2 class="single-banner-heading heading_42 text-white animate__animated animate__fadeInUp"
                            data-animation="animate__animated animate__fadeInUp">
                            Climb up to the mountain with NIK
                        </h2>
                        <p class="single-banner-text text_16 text-white animate__animated animate__fadeInUp"
                            data-animation="animate__animated animate__fadeInUp">
                            Free shipping, and no hassle returns. NIK Running shoes for men & women
                        </p>
                        <a class="btn-primary single-banner-btn animate__animated animate__fadeInUp"
                            href="collection-left-sidebar.html" data-animation="animate__animated animate__fadeInUp">
                            SHOP NOW
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single banner end -->

    <!-- instagram start -->
    <div class="instagram-section mt-100 overflow-hidden home-section">
        <div class="instagram-inner">
            <div class="container">
                <div class="section-header text-center">
                    <div class="section-icon">
                        <svg width="54" height="54" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.99998 2.62165C12.4031 2.62165 12.6877 2.6308 13.6367 2.6741C14.5142 2.71415 14.9908 2.86077 15.3079 2.98398C15.728 3.14725 16.0278 3.34231 16.3428 3.65723C16.6577 3.97215 16.8528 4.272 17.016 4.69206C17.1392 5.00923 17.2859 5.48577 17.3259 6.36323C17.3692 7.31228 17.3783 7.5969 17.3783 10C17.3783 12.4031 17.3692 12.6878 17.3259 13.6368C17.2859 14.5143 17.1392 14.9908 17.016 15.308C16.8528 15.728 16.6577 16.0279 16.3428 16.3428C16.0278 16.6577 15.728 16.8528 15.3079 17.016C14.9908 17.1393 14.5142 17.2859 13.6367 17.3259C12.6879 17.3692 12.4032 17.3784 9.99998 17.3784C7.59672 17.3784 7.3121 17.3692 6.36323 17.3259C5.48574 17.2859 5.00919 17.1393 4.69206 17.016C4.27196 16.8528 3.97212 16.6577 3.6572 16.3428C3.34227 16.0279 3.14721 15.728 2.98398 15.308C2.86073 14.9908 2.71411 14.5143 2.67406 13.6368C2.63076 12.6878 2.62162 12.4031 2.62162 10C2.62162 7.5969 2.63076 7.31228 2.67406 6.36326C2.71411 5.48577 2.86073 5.00923 2.98398 4.69206C3.14721 4.272 3.34227 3.97215 3.6572 3.65723C3.97212 3.34231 4.27196 3.14725 4.69206 2.98398C5.00919 2.86077 5.48574 2.71415 6.36319 2.6741C7.31224 2.6308 7.59687 2.62165 9.99998 2.62165ZM9.99998 1C7.55571 1 7.24926 1.01036 6.28931 1.05416C5.33133 1.09789 4.67712 1.25001 4.10462 1.47251C3.51279 1.70251 3.01088 2.01025 2.51055 2.51058C2.01021 3.01092 1.70247 3.51283 1.47247 4.10466C1.24997 4.67716 1.09785 5.33137 1.05412 6.28935C1.01032 7.24926 1 7.55575 1 10C1 12.4443 1.01032 12.7508 1.05412 13.7107C1.09785 14.6687 1.24997 15.3229 1.47247 15.8954C1.70247 16.4872 2.01021 16.9891 2.51055 17.4895C3.01088 17.9898 3.51279 18.2975 4.10462 18.5275C4.67712 18.75 5.33133 18.9021 6.28931 18.9459C7.24926 18.9897 7.55571 19 9.99998 19C12.4443 19 12.7507 18.9897 13.7107 18.9459C14.6686 18.9021 15.3228 18.75 15.8953 18.5275C16.4872 18.2975 16.9891 17.9898 17.4894 17.4895C17.9898 16.9891 18.2975 16.4872 18.5275 15.8954C18.75 15.3229 18.9021 14.6687 18.9458 13.7107C18.9896 12.7508 19 12.4443 19 10C19 7.55575 18.9896 7.24926 18.9458 6.28935C18.9021 5.33137 18.75 4.67716 18.5275 4.10466C18.2975 3.51283 17.9898 3.01092 17.4894 2.51058C16.9891 2.01025 16.4872 1.70251 15.8953 1.47251C15.3228 1.25001 14.6686 1.09789 13.7107 1.05416C12.7507 1.01036 12.4443 1 9.99998 1ZM9.99998 5.37838C7.44753 5.37838 5.37835 7.44757 5.37835 10C5.37835 12.5525 7.44753 14.6217 9.99998 14.6217C12.5524 14.6217 14.6216 12.5525 14.6216 10C14.6216 7.44757 12.5524 5.37838 9.99998 5.37838ZM9.99998 13C8.34314 13 6.99996 11.6569 6.99996 10C6.99996 8.34317 8.34314 7 9.99998 7C11.6568 7 13 8.34317 13 10C13 11.6569 11.6568 13 9.99998 13ZM15.8842 5.19579C15.8842 5.79226 15.4007 6.27581 14.8042 6.27581C14.2077 6.27581 13.7242 5.79226 13.7242 5.19579C13.7242 4.59931 14.2077 4.1158 14.8042 4.1158C15.4007 4.1158 15.8842 4.59931 15.8842 5.19579Z"
                                fill="#00234D" />
                        </svg>
                    </div>
                    <h2 class="section-heading">Shoe products</h2>
                    <p class="section-subheading">See how our customers styled shoe products in their foot</p>
                </div>
                <div class="instagram-container position-relative mt-48">
                    <div class="common-slider"
                        data-slick='{
                                "slidesToShow": 4,
                                "slidesToScroll": 1,
                                "dots": false,
                                "arrows": true,
                                "responsive": [
                                  {
                                    "breakpoint": 1281,
                                    "settings": {
                                      "slidesToShow": 3
                                    }
                                  },
                                  {
                                    "breakpoint": 768,
                                    "settings": {
                                      "slidesToShow": 2
                                    }
                                  }
                                ]
                            }'>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s1.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s2.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s3.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s4.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s2.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s4.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                        <div class="instagram-slick-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="instagram-card">
                                <a class="instagram-img-wrapper" href="index-shoe.html">
                                    <img src="{{ asset('assets/front/img/instagram/s1.jpg') }}" alt="img"
                                        class="instagram-card-img rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- instagram end -->

    <!-- newsletter start -->
    <div class="newsletter-section mt-100 overflow-hidden">
        <div class="newsletter-inner">
            <div class="position-relative">
                <img class="single-banner-img" src="{{ asset('assets/front/img/newsletter/2.jpg') }}"
                    alt="slide-1">

                <div class="content-absolute">
                    <div class="container height-inherit d-flex align-items-center justify-content-center">
                        <div class="content-box py-4">
                            <div class="newsletter-content newsletter-content-2 text-center">
                                <div class="newsletter-header">
                                    <p class="newsletter-subheading heading_24">News Letter</p>
                                    <h2 class="newsletter-heading heading_42">Subscribe to our newsletter</h2>
                                </div>
                                <div class="newsletter-form-wrapper">
                                    <form action="#" class="newsletter-form d-flex align-items-center rounded">
                                        <input class="newsletter-input bg-transparent border-0" type="email"
                                            placeholder="Enter your e-mail" autocomplete="off">
                                        <button class="newsletter-btn rounded" type="submit">
                                            <svg width="17" height="14" viewBox="0 0 17 14" fill="#fff"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.11539 -0.000488604L7.50417 1.99951L11.5769 5.59951L0.500001 5.59951L0.500001 8.19951L11.7049 8.19951L7.50417 11.4995L8.70513 13.9995L16.5 7.19951L9.11539 -0.000488604Z"
                                                    fill="#FEFEFE" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletter end -->

    <!-- brand logo start -->
    <div class="brand-logo-section mt-100">
        <div class="brand-logo-inner">
            <div class="container">
                <div class="brand-logo-container overflow-hidden">
                    <div class="scroll-horizontal row align-items-center flex-nowrap">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="index-shoe.html"
                                class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/img/brand/1.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="index-shoe.html"
                                class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/img/brand/2.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="index-shoe.html"
                                class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/img/brand/3.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="index-shoe.html"
                                class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/img/brand/4.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="index-shoe.html"
                                class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/img/brand/5.png') }}" alt="img">
                            </a>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6" data-aos="fade-up"
                            data-aos-duration="700">
                            <a href="index-shoe.html"
                                class="brand-logo d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/front/img/brand/6.png') }}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo end -->
</div>
