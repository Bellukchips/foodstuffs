@extends('user.home')
<!-- Page Content -->
<div class="page-content page-cart">
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
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('section2')
        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="container">
                        <div class="row" data-aos="fade-up" data-aos-delay="150">
                            <div class="col-12 table-responsive">
                                @if (session()->has('failedRequest'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('failedRequest') }}
                                    </div>
                                @endif
                                <table class="table table-borderless table-cart">
                                    <thead>
                                        <tr>
                                            <td>Image</td>
                                            <td>Name &amp; Seller</td>
                                            <td>Price</td>
                                            <td>Menu</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $data )
                                            <tr>
                                                <td style="width: 25%">
                                                    <img src="{{ url('storage/' . $data->img_product) }}" alt=""
                                                        class="cart-image w-100" />
                                                </td>
                                                <td style="width: 35%">
                                                    <div class="product-title">{{ $data->name_product }}</div>
                                                    <div class="product-substitle">By {{ $data->store_name }}</div>
                                                </td>
                                                <td style="width: 35%">
                                                    <div class="product-title">Rp{{ $data->total_cart }} </div>
                                                    <div class="product-substitle">Rupiah</div>
                                                </td>
                                                <td style="width: 20%">
                                                    <form action="{{ route('cart.destroy', $data->id_cart) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-remove-cart">Remove</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-down" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-2">Shipping Details</h2>
                    </div>
                </div>
                <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ Auth::user()->name ?? old('name') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input class="form-control" type="text" name="email" id="email"
                                value="{{ Auth::user()->email ?? old('email') }}" placeholder="jhonDoe@mail.com"
                                readonly />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Province</label>
                            <input class="form-control" type="text" name="province" value="{{ Auth::user()->province }}"
                                placeholder="Central Java" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="City">City</label>
                            <input class="form-control" type="text" name="city" value="{{ Auth::user()->city }}"
                                placeholder="Semarang" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input class="form-control" type="text" placeholder="59584" name="zip_code"
                                value="{{ Auth::user()->zip_code ?? old('zip_code') }}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" id="country"
                                value="{{ Auth::user()->country ?? old('country') }}" placeholder="Indonesia" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" name="phone" id="mobile"
                                value="{{ Auth::user()->phone ?? old('phone') }}" placeholder="+62123455689" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" id="" cols="30" rows="10" class="form-control"
                                placeholder="Jl. Imam Bonjol, Semarang">{{ Auth::user()->address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-down" data-aos-delay="250">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-2">Payment Information</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-4 col-md-2">
                        <div class="product-title">Rp.15.000</div>
                        <div class="product-substitle">Country Tax</div>
                    </div>
                    <div class="col-4 col-md-3">
                        <div class="product-title">Rp.20.000</div>
                        <div class="product-substitle">Product Insurance</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title">Rp.50.000</div>
                        <div class="product-substitle">Ship to Jakarta</div>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="product-title text-success">Rp.12.464.999</div>
                        <div class="product-substitle">Total</div>
                    </div>
                    <div class="col-8 col-md-3">
                        <a href="" class="btn btn-success mt-3 btn-block">Checkout Now</a>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</div>
