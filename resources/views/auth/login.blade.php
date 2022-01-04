<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Foodstuffs Store - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('food/style/main.css') }}" rel="stylesheet" />
</head>

<body>
    <nav class="
        navbar navbar-expand-lg navbar-light navbar-store
        fixed-top
        navbar-fixed-top
      "
        data-aos="fade-down">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('food/images/logo.svg') }}" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">Rewards</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- page content -->
    <div class="page-content page-auth">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center row-login">
                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('food/images/login-placeholder.png') }}" alt="login-image"
                            class="w-50 mb-4 mb-lg-0" />
                    </div>
                    <div class="col-lg-5">
                        <h2>
                            Belanja kebutuhan utama, <br />
                            menjadi lebih mudah


                            <form action="{{ route('authenticate') }}" class="mt-3" method="POST">
                        </h2>
                        <!---
                Alert errors
            -->
                        <div class="form-group">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('authFailed'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('authFailed') }}
                                </div>
                            @endif
                        </div>
                        </h2>
                        <!---
                            login form  
    -->
                        @csrf
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" name="email" id="" class="form-control w-75" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" class="form-control w-75" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                            Sign In to My Account
                        </button>
                        <a href="{{ route('register') }}" class="btn btn-signup btn-block w-75 mt-2">
                            Sign Up
                        </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('food/vendor/jquery/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('food/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('food/script/navbar-scroll.js') }}"></script>
</body>

</html>
