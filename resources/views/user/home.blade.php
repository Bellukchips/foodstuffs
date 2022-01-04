<!DOCTYPE html>
<html lang="en">

<head>
    <title>Foodstuffs Store - Your Best Marketplace</title>
    @include('user.__partials.head')
</head>

<body>
    @include('user.__partials.nav')
    @yield('section1')

    @yield('section2')

    @yield('section3')
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
