 <!-- Sidebar -->
 <div class="border-right" id="sidebar-wrapper">
     <div class="sidebar-heading text-center">

         <img src="           @if (Auth::user()->profile_photo_path==null)
         {{ asset('food/images/icons-testimonial-2.png') }}
     @else
         {{ url('storage/' . Auth::user()->profile_photo_path) }}
         @endif" alt="" class="rounded-circle mr-2 profile-picture" width="120" height="120" data-holder-rendered="true"
         />
     </div>
     <div class="text-center">
         @php
             $fullName = Auth::user()->name;
             $firstName = strtok($fullName, ' ');
         @endphp
         {{ 'Hi, ' . $firstName }}
     </div>
     <br>
     <div class="list-group list-group-flush">
         <a href="{{ route('dashboardUser') }}" class="list-group-item list-group-item-action">
             Home</a>
         @if (Route::is('goToDashboard'))
             <a href="{{ route('goToDashboard') }}" class="list-group-item list-group-item-action active">
                 Dashboard</a>
         @else
             <a href="{{ route('goToDashboard') }}" class="list-group-item list-group-item-action">
                 Dashboard</a>
         @endif
         @if (Route::is('product.index'))
             <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action active">
                 My Product</a>
         @else
             <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action">
                 My Product</a>
         @endif
         @if (Route::is('goToTransactionDashboard'))
             <a href="{{ route('goToTransactionDashboard') }}" class="list-group-item list-group-item-action active">
                 Transactions</a>
         @else
             <a href="{{ route('goToTransactionDashboard') }}" class="list-group-item list-group-item-action">
                 Transactions</a>
         @endif
         @if (Route::is('goToStoreSettings'))
             <a href="{{ route('goToStoreSettings') }}" class="list-group-item list-group-item-action active">
                 Store Settings</a>
         @else
             <a href="{{ route('goToStoreSettings') }}" class="list-group-item list-group-item-action">
                 Store Settings</a>
         @endif
         @if (Route::is('goToAccount'))
             <a href="{{ route('goToAccount') }}" class="list-group-item list-group-item-action active">
                 My Account</a>
         @else
             <a href="{{ route('goToAccount') }}" class="list-group-item list-group-item-action">
                 My Account</a>
         @endif
         <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button type="submit" class="list-group-item list-group-item-action">Sign Out</button>
         </form>


     </div>
 </div>
