@extends('user.dashboard.dashboard')
@section('navbar')
    @include('user.dashboard.__partials.nav_bar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">DASHBOARD</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Customer</div>
                            <div class="dashboard-card-subtitle">0</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Revenue</div>
                            <div class="dashboard-card-subtitle">Rp0</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Transactions</div>
                            <div class="dashboard-card-subtitle">0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transactions</h5>
                    <a href="dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/dashboard-icon-product-1.png" alt="" />
                                </div>
                                <div class="col-md-4">Shirup Marzzan</div>
                                <div class="col-md-3">Angga Risky</div>
                                <div class="col-md-3">12 Januari, 2020</div>
                                <div class="col-md-1-d-none">
                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/dashboard-icon-product-2.png" alt="" />
                                </div>
                                <div class="col-md-4">Nike Airmax</div>
                                <div class="col-md-3">Masayoshi</div>
                                <div class="col-md-3">12 Januari, 2020</div>
                                <div class="col-md-1-d-none">
                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/dashboard-icon-product-3.png" alt="" />
                                </div>
                                <div class="col-md-4">Sofa Maurice 2</div>
                                <div class="col-md-3">Dwi Candra</div>
                                <div class="col-md-3">12 Januari, 2021</div>
                                <div class="col-md-1-d-none">
                                    <img src="/images/dashboard-arrow-right.svg" alt="" />
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
