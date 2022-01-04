<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foodstuffs Store - Your Best Marketplace</title>
    @include('user.__partials.head')
</head>

<body>
    <!-- page dashboard -->
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">

            <!--sidebar-->
            @include('user.dashboard.__partials.sidebar')
            <!-- Page Contents -->
            <div id="page-content-wrapper">
                @yield('navbar')
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
