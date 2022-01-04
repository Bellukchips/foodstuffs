@extends('user.home')
<div class="page-content page-detail">
    @section('section1')
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboardUser') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Product Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('section2')
        <section class="store-gallery" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <!-- mengambil img dari photos menggunakan array activePhotoss  -->
                            <img src="{{ url('storage/' . $foodstuffs->thumbnail) }}" class="w-100 main-image" alt="" />
                        </transition>
                    </div>
                </div>
            </div>
        </section>

        <div class="store-details-container" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <br>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h1>{{ $foodstuffs->name }}</h1>
                            <div class="owner">by {{ $foodstuffs->partner->name }}</div>
                            <div class="price" style="color: orangered">Rp{{ $foodstuffs->price }}</div>
                            <form action="{{ route('addToCart', $foodstuffs->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success px-4 text-white btn-block md-3">Add To Cart</button>

                            </form>
                            <br><br>
                        </div>

                    </div>
                </div>
            </section>
        @endsection
        @section('section3')
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <p>
                                {{ strip_tags($foodstuffs->desc) }}

                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-review">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5>Customer Review (3)</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img src="{{ asset('food/images/icons-testimonial-2.png') }}"
                                        class="mr-3 rounded-circle" alt="" width="50" height="50" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Hazza Rizky</h5>
                                        <p>
                                            Masih Fresh Gannnn
                                        </p>
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="{{ asset('food/images/icons-testimonial-2.png') }}"
                                        class="mr-3 rounded-circle" alt="" width="50" height="50" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                                        <p>
                                            Lembut Banget
                                        </p>
                                    </div>
                                </li>
                                <li class="media">
                                    <img src="{{ asset('food/images/icons-testimonial-2.png') }}"
                                        class="mr-3 rounded-circle" alt="" width="50" height="50" />
                                    <div class="media-body">
                                        <h5 class="mt-2 mb-1">Roses Anelstra</h5>
                                        <p>
                                            Gak Nyesel beli disini
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        @endsection
    </div>
