<div>
    <!-- featured collection start -->
    <div class="featured-collection-section mt-100 home-section overflow-hidden">
        <div class="container">
            <div class="section-header text-center">
                <p class="section-subheading">WHAT'S NEW</p>
                <h2 class="section-heading">The Latest Drop</h2>
            </div>

            <div class="product-container position-relative">
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
                    @foreach ($sliders as $slider)
                        <div class="new-item" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card">
                                @php
                                    $imageArray = json_decode($slider->images, true);
                                    $imagePath = !empty($imageArray) ? $imageArray[0] : 'default.png';
                                @endphp
                                <div class="product-card-img">
                                    <a class="hover-switch" href="collection-left-sidebar.html">
                                        <img class="secondary-img" src="{{ asset('storage/' . $imagePath) }}"
                                            alt="product-img">
                                        <img class="primary-img" src="{{ asset('storage/' . $imagePath) }}"
                                            alt="product-img">
                                    </a>

                                    <div class="product-badge">
                                        <span
                                            class="badge-label badge-percentage rounded">-{{ $slider->discount_percentage }}%</span>
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
                                        <li><a href="javascript:void(0)" class="color-swatch swatch-cyan"></a>
                                        </li>
                                        <li><a href="javascript:void(0)" class="color-swatch swatch-purple"></a>
                                        </li>
                                    </ul>
                                    <h3 class="product-card-title">
                                        <a href="collection-left-sidebar.html">{{ $slider->name }}</a>
                                    </h3>
                                    <div class="product-card-price">
                                        <span class="card-price-regular">${{ $slider->final_price }}</span>
                                        <span
                                            class="card-price-compare text-decoration-line-through">${{ $slider->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
            </div>
        </div>
    </div>
    <!-- featured collection end -->
</div>
