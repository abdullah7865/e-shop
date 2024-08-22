<div>
    <div class="collection mt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                        <div class="collection-title-wrap d-flex align-items-end">
                            <h2 class="collection-title heading_24 mb-0">All products</h2>
                            <p class="collection-counter text_16 mb-0 ms-2">({{ $count }})</p>
                        </div>
                        <div class="filter-sorting">
                            <div class="collection-sorting position-relative d-none d-lg-block">
                                <div class="sorting-header text_16 d-flex align-items-center justify-content-end">
                                    <span class="sorting-title me-2">Sort by:</span>
                                    <span
                                        class="active-sorting {{ empty($sortBy) ? 'active-sorting' : '' }}">Featured</span>
                                    <span class="sorting-icon">
                                        <svg class="icon icon-down" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </span>
                                </div>
                                <ul class="sorting-lists list-unstyled m-0">
                                    <li>
                                        <a href="#" wire:click.prevent="$set('sortBy', 'name_asc')"
                                            class="text_14 {{ $sortBy === 'name_asc' ? 'active-sorting' : '' }}">
                                            Alphabetically, A-Z
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click.prevent="$set('sortBy', 'name_desc')"
                                            class="text_14 {{ $sortBy === 'name_desc' ? 'active-sorting' : '' }}">
                                            Alphabetically, Z-A
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click.prevent="$set('sortBy', 'price_asc')"
                                            class="text_14 {{ $sortBy === 'price_asc' ? 'active-sorting' : '' }}">
                                            Price, low to high
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click.prevent="$set('sortBy', 'price_desc')"
                                            class="text_14 {{ $sortBy === 'price_desc' ? 'active-sorting' : '' }}">
                                            Price, high to low
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click.prevent="$set('sortBy', 'date_asc')"
                                            class="text_14 {{ $sortBy === 'date_asc' ? 'active-sorting' : '' }}">
                                            Date, old to new
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click.prevent="$set('sortBy', 'date_desc')"
                                            class="text_14 {{ $sortBy === 'date_desc' ? 'active-sorting' : '' }}">
                                            Date, new to old
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="filter-drawer-trigger mobile-filter d-flex align-items-center d-lg-none">
                                <span class="mobile-filter-icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                </span>
                                <span class="mobile-filter-heading">Sorting</span>
                            </div>
                        </div>
                    </div>
                    <div class="collection-product-container">
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
                                                <img class="secondary-img" src="{{ asset('storage/' . $imagePath) }}"
                                                    alt="product-img">
                                                <img class="primary-img" src="{{ asset('storage/' . $imagePath) }}"
                                                    alt="product-img">
                                            </a>

                                            <div class="product-badge">
                                                <span
                                                    class="badge-label badge-percentage rounded">-{{ $product->discount_percentage }}%</span>
                                            </div>

                                            <div
                                                class="product-card-action product-card-action-2 justify-content-center">
                                                <a href="#quickview-modal" class="action-card action-quickview" data-bs-toggle="modal">
                                                    <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
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
                                                <li><a href="javascript:void(0)"
                                                        class="color-swatch swatch-black active"></a></li>
                                                <li><a href="javascript:void(0)" class="color-swatch swatch-cyan"></a>
                                                </li>
                                                <li><a href="javascript:void(0)" class="color-swatch swatch-purple"></a>
                                                </li>
                                            </ul>
                                            <h3 class="product-card-title">
                                                <a href="collection-left-sidebar.html">{{ $product->name }}</a>
                                            </h3>
                                            <div class="product-card-price">
                                                <span class="card-price-regular">${{ $product->final_price }}</span>
                                                <span
                                                    class="card-price-compare text-decoration-line-through">${{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination justify-content-center mt-100">
                        <nav>
                            <ul class="pagination m-0 d-flex align-items-center">
                                <li class="item disabled">
                                    <a class="link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                    </a>
                                </li>
                                <li class="item"><a class="link" href="#">1</a></li>
                                <li class="item active"><a class="link" href="#">2</a></li>
                                <li class="item"><a class="link" href="#">3</a></li>
                                <li class="item"><a class="link" href="#">4</a></li>
                                <li class="item">
                                    <a class="link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="quickview-modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- @if ($selectedProduct) --}}
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="product-gallery product-gallery-vertical d-flex">
                                    <div class="product-img-large">
                                        <div class="qv-large-slider img-large-slider common-slider"
                                            data-slick='{
                                        "slidesToShow": 1,
                                        "slidesToScroll": 1,
                                        "dots": false,
                                        "arrows": false,
                                        "asNavFor": ".qv-thumb-slider"
                                    }'>
                                            <div class="img-large-wrapper">
                                                <img src="{{ asset('assets/front/img/products/bags/39.jpg') }}"
                                                    alt="img">
                                            </div>
                                            <div class="img-large-wrapper">
                                                <img src="{{ 'assets/front/img/products/bags/38.jpg' }}"
                                                    alt="img">
                                            </div>
                                            <div class="img-large-wrapper">
                                                <img src="{{ 'assets/front/img/products/bags/37.jpg' }}"
                                                    alt="img">
                                            </div>
                                            <div class="img-large-wrapper">
                                                <img src="{{ 'assets/front/img/products/bags/36.jpg' }}"
                                                    alt="img">
                                            </div>
                                            <div class="img-large-wrapper">
                                                <img src="{{ 'assets/front/img/products/bags/34.jpg' }}"
                                                    alt="img">
                                            </div>
                                            <div class="img-large-wrapper">
                                                <img src="{{ 'assets/front/img/products/bags/30.jpg' }}"
                                                    alt="img">
                                            </div>
                                            <div class="img-large-wrapper">
                                                <img src="{{ 'assets/front/img/products/bags/32.jpg' }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-img-thumb">
                                        <div class="qv-thumb-slider img-thumb-slider common-slider"
                                            data-vertical-slider="true"
                                            data-slick='{
                                        "slidesToShow": 5,
                                        "slidesToScroll": 1,
                                        "dots": false,
                                        "arrows": true,
                                        "infinite": false,
                                        "speed": 300,
                                        "cssEase": "ease",
                                        "focusOnSelect": true,
                                        "swipeToSlide": true,
                                        "asNavFor": ".qv-large-slider"
                                    }'>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/39.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/38.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/37.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/36.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/34.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/30.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="img-thumb-wrapper">
                                                    <img src="{{ 'assets/front/img/products/bags/32.jpg' }}"
                                                        alt="img">
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="product-details ps-lg-4">
                                    <div class="mb-3"><span class="product-availability">In Stock</span></div>
                                    <h2 class="product-title mb-3">{{ $product->name }}</h2>
                                    <div class="product-rating d-flex align-items-center mb-3">
                                        <span class="star-rating">
                                            <i class="fas fa-star" style="color: #FFAE00;"></i>
                                            <i class="fas fa-star" style="color: #FFAE00;"></i>
                                            <i class="fas fa-star" style="color: #FFAE00;"></i>
                                            <i class="fas fa-star" style="color: #FFAE00;"></i>
                                            <i class="fas fa-star" style="color: #B2B2B2;"></i>
                                        </span>
                                        <span class="rating-count ms-2">(22)</span>
                                    </div>
                                    <div class="product-price-wrapper mb-4">
                                        <span class="product-price regular-price">$24.00</span>
                                        <del class="product-price compare-price ms-2">$32.00</del>
                                    </div>
                                    <div class="product-sku product-meta mb-1">
                                        <strong class="label">SKU:</strong> 401
                                    </div>
                                    <div class="product-vendor product-meta mb-3">
                                        <strong class="label">Vendor:</strong> leather
                                    </div>

                                    <div class="product-variant-wrapper">
                                        <div class="product-variant product-variant-color">
                                            <strong class="label mb-1 d-block">Color:</strong>

                                            <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                                <li class="variant-item">
                                                    <input type="radio" value="cyan" checked>
                                                    <label class="variant-label swatch-cyan"></label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="black">
                                                    <label class="variant-label swatch-black"></label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="purple">
                                                    <label class="variant-label swatch-purple"></label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="blue">
                                                    <label class="variant-label swatch-blue"></label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="orange">
                                                    <label class="variant-label swatch-orange"></label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="teal">
                                                    <label class="variant-label swatch-teal"></label>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="product-variant product-variant-other">
                                            <strong class="label mb-1 d-block">Size:</strong>

                                            <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                                <li class="variant-item">
                                                    <input type="radio" value="34" checked>
                                                    <label class="variant-label">34</label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="36">
                                                    <label class="variant-label">36</label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="38">
                                                    <label class="variant-label">38</label>
                                                </li>
                                                <li class="variant-item">
                                                    <input type="radio" value="40">
                                                    <label class="variant-label">40</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="misc d-flex align-items-end justify-content-between mt-4">
                                        <div class="quantity d-flex align-items-center justify-content-between">
                                            <button class="qty-btn dec-qty"><img
                                                    src="{{ asset('assets/front/img/icon/minus.svg') }}"
                                                    alt="minus"></button>
                                            <input class="qty-input" type="number" name="qty" value="1"
                                                min="0">
                                            <button class="qty-btn inc-qty"><img
                                                    src="{{ asset('assets/front/img/icon/plus.svg') }}"
                                                    alt="plus"></button>
                                        </div>
                                    </div>

                                    <form class="product-form" action="#">
                                        <div
                                            class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                            <button type="submit"
                                                class="position-relative btn-atc btn-add-to-cart loader">ADD TO
                                                CART</button>
                                            <a href="#" class="product-wishlist">
                                                <i class="fa-regular fa-heart" style="color: #000000;"></i>
                                            </a>
                                        </div>
                                        <div class="buy-it-now-btn mt-2">
                                            <button type="submit" class="position-relative btn-atc btn-buyit-now">BUY
                                                IT
                                                NOW</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
