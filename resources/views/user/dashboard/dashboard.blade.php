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
    <!-- page dashboard -->
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">

            <!--sidebar-->
            @include('user.dashboard.__partials.sidebar')
            <!-- Page Contents -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                            &laquo; Menu
                        </button>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Desktop Menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                @include('user.__partials.navbar_profile')
                                <li class="nav-item">
                                    <a href="" class="nav-link d-inline-block mt-2">
                                        <img src="{{ asset('food/images/icon-cart-filled.svg') }}" alt="" />
                                        <div class="card-badge">3</div>
                                    </a>
                                </li>
                            </ul>
                            {{-- <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="#" class="nav-link"> Hi, CK </a>
                                </li>
                                <li class="navbar-item">
                                    <a href="#" class="nav-link d-inline-block"> Cart </a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </nav>

                <!-- Section Contents  -->
                <div class="section-content section-dashboard-home" data-aos="fade-up">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @include('user.__partials.footer')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    @yield('script')
</body>

</html>
