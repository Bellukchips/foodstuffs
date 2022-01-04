@extends('user.home')
<div class="page-content page-home">
    @section('section1')
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
    @endsection
    @section('section2')
        <br>
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
                    @forelse ($categorie as $item )
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                            <a href="#" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ url('storage/' . $item->image_categories) }}" alt="categories-vegetarian"
                                        class="w-100" />
                                    <p class="categories-text">{{ $item->title }}</p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                            <a href="#" class="component-categories d-block">
                                <div class="categories-image">
                                    <p class="categories-text">No Category</p>
                                </div>
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endsection
    @section('section3')
        <!-- Page New Product -->
        <section class="store-new-product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>New Product</h5>
                    </div>
                </div>
                <div class="row">
                    @forelse ($product as $data )
                        <div class="col-6 col-mb-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ route('detailProduct', $data->id) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="
                                      background-image: url('{{ url('storage/' . $data->thumbnail) }}');">
                                    </div>
                                </div>
                                <div class="products-text">{{ $data->name }}</div>
                                <div class="products-price">Rp{{ $data->price }}</div>
                            </a>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </section>
    @endsection
</div>
