<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foodstuffs Store - Your Best Marketplace</title>
    @include('user.__partials.head')
</head>

<body>
    @include('user.__partials.nav')
    <!-- page content -->
    <div class="page-content page-home">
        <!-- Page Categories -->
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @forelse ($banner as $index => $data )
                                    <li class="@if ($index == 0)
                                    active
                                @endif"
                                        data-target="#storeCarousel" data-slide-to="{{ $index }}"></li>
                                @empty
                                    <div></div>
                                @endforelse

                            </ol>
                            <div class="carousel-inner">
                                @forelse ($banner as $index => $data )
                                    <div
                                        class="carousel-item @if ($index == 0)
                                        active
                                    @endif">
                                        <img src="{{ url('storage/' . $data->img_banner) }}" alt="Carousel-Image"
                                            class="d-block w-100" />
                                    </div>
                                @empty
                                    <div class="carousel-item active">
                                        <img src="{{ asset('food/images/banner.jpg') }}" alt="Carousel-Image"
                                            class="d-block w-100" />
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row">
                    <!-- Responsive
              col-6 = ukuran paling kecil
              col-3 = sedang
              col-2 = gede -->
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="{{ asset('food/images/categories-vegetarian.png') }}"
                                    alt="categories-vegetarian" class="w-100" />
                                <p class="categories-text">Vegetarian</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="{{ asset('food/images/categories-fruits.png') }}" alt="categories-fruits"
                                    class="w-100" />
                                <p class="categories-text">Fruits</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="{{ asset('food/images/categories-milk-box.png') }}" alt="categories-milk"
                                    class="w-100" />
                                <p class="categories-text">Milk</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="{{ asset('food/images/categories-beef.png') }}" alt="categories-beef"
                                    class="w-100" />
                                <p class="categories-text">Meat</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page New Product -->
        <section class="store-new-product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>New Product</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                      background-image: url('images/products-brocolli.jpg');
                    "></div>
                            </div>
                            <div class="products-text">Brocolli</div>
                            <div class="products-price">Rp.8.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="
                      background-image: url('images/products-strawberry.jpg');
                    "></div>
                            </div>
                            <div class="products-text">Strawberry</div>
                            <div class="products-price">Rp.20.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('images/products-milk.jpg')">
                                </div>
                            </div>
                            <div class="products-text">Cow's Milk</div>
                            <div class="products-price">Rp.14.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('images/products-eggs.jpg')">
                                </div>
                            </div>
                            <div class="products-text">Egg</div>
                            <div class="products-price">Rp.25.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('images/products-apple.jpg')">
                                </div>
                            </div>
                            <div class="products-text">Apple</div>
                            <div class="products-price">Rp.15.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('images/products-meat.jpg')">
                                </div>
                            </div>
                            <div class="products-text">Beef</div>
                            <div class="products-price">Rp.40.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="background-image: url('images/products-spinach.jpg')"></div>
                            </div>
                            <div class="products-text">Spinach</div>
                            <div class="products-price">Rp.5.000</div>
                        </a>
                    </div>
                    <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image: url('images/products-kale.jpg')">
                                </div>
                            </div>
                            <div class="products-text">Kangkung</div>
                            <div class="products-price">Rp.8.000</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="pt-4 pb-3">2021 Copyright Store. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    @include('user.__partials.footer')
</body>

</html>
