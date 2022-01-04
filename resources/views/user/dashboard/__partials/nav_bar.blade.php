<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
    <div class="container-fluid">
        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
            &laquo; Menu
        </button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                <li class="nav-item">
                    <a href="{{ route('cart.index') }}" class="nav-link d-inline-block mt-2">
                        <img src="{{ asset('food/images/icon-cart-filled.svg') }}" alt="" />
                        <div class="card-badge">{{ $cart }}</div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
