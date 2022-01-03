<nav class="
navbar navbar-expand-lg navbar-light navbar-store
fixed-top
navbar-fixed-top
" data-aos="fade-down">
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
                    <a href="{{ route('dashboardUser') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Rewards</a>
                </li>
                <li class="nav-item">
                    @if (Auth::user() == null)
                        <a href="{{ route('register') }}" class="btn btn-success nav-link px-4 text-white">Sign Up</a>
                    @else
                        <div></div>
                    @endif
                </li>
            </ul>
            <ul class="navbar-nav d-none d-lg-flex">
                @include('user.__partials.navbar_profile')
                <li class="nav-item">
                    <a href="" class="nav-link d-inline-block mt-2">
                        <img src="{{ asset('food/images/icon-cart-empty.svg') }}" alt="" />
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
