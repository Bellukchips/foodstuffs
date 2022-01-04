<li class="nav-item dropdown">
    <a href="#" class="nav-link" id="navbarDropdown" data-toggle="dropdown">
        <img src="  @if (Auth::user()->profile_photo_path==null)
        {{ asset('food/images/icons-testimonial-2.png') }}
    @else
        {{ url('storage/' . Auth::user()->profile_photo_path) }}
        @endif" alt="" class="rounded-circle mr-2 profile-picture" />
        @php
            $fullName = Auth::user()->name;
            $firstName = strtok($fullName, ' ');
        @endphp
        {{ 'Hi, ' . $firstName }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if (Route::is('dashboardUser'))
            <div></div>
        @else
            <a href="{{ route('dashboardUser') }}" class="dropdown-item">Menu</a>

        @endif
        <a href="{{ route('goToDashboard') }}" class="dropdown-item">Dashboard</a>
        <div class="dropdown-dividen">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Sign Out</button>
            </form>
        </div>
    </div>
</li>
