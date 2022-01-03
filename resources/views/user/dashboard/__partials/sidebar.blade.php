 <!-- Sidebar -->
 <div class="border-right" id="sidebar-wrapper">
     <div class="sidebar-heading text-center">
         <img src="{{ asset('food/images/dashboard-store-logo.svg') }}" alt="dashboard-logo" class="my-4" />
     </div>
     <div class="list-group list-group-flush">
         @if (Route::is('goToDashboard'))
             <a href="{{ route('goToDashboard') }}" class="list-group-item list-group-item-action active">
                 Dashboard</a>
         @else
             <a href="{{ route('goToDashboard') }}" class="list-group-item list-group-item-action">
                 Dashboard</a>
         @endif
         @if (Route::is('goToProductDashboard'))
             <a href="{{ route('goToProductDashboard') }}" class="list-group-item list-group-item-action active">
                 My Product</a>
         @else
             <a href="{{ route('goToProductDashboard') }}" class="list-group-item list-group-item-action">
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
     </div>
 </div>
