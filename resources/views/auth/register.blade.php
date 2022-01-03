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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="
        navbar navbar-expand-lg navbar-light navbar-store
        fixed-top
        navbar-fixed-top
      "
        data-aos="fade-down">
        <div class="container">
            <a href="" class="navbar-brand">
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
    <div class="page-content page-auth" id="register">
        <div class="section-store-auth" data-aos="fade-up">
            <div class="container">
                <div class="row align-items-center justify-content-center row-login mt-5">
                    <div class="col-lg-4">
                        <h2>Memulai untuk jual beli dengan cara terbaru <br /></h2>
                        <form action="{{ route('registerPost') }}" class="mt-3" method="POST">
                            <div class="container-fluid">
                                @if (session()->has('authFailed'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('authFailed') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        </p>
                                    </div>
                                @endif
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullName" class="form-control" autofocus
                                    value="{{ old('fullName') }}" />
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ old('password') }}" />
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <p class="text-muted">Select youre gender</p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" />
                                    <label class="form-check-label" for="inlineRadio1">Female</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" />
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-block w-100 mt-4">
                                Sign Up Now
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-signup btn-block w-100 mt-2">
                                Back to Sign In
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
    <script src="{{ asset('food/vendor/vue/vue.js') }}"></script>
    <script src="{{ asset('food/script/navbar-scroll.js') }}"></script>
</body>

</html>
