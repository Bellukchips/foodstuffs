@extends('user.dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Settings</h2>
            <p class="dashboard-subtitle">Make store that profitable</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Store Name</label>
                                            <input class="form-control" type="text" placeholder="Papel La Casa" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="" disabled>
                                                    Select Categories
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Store Status</label>
                                            <p class="text-muted">
                                                Apakah saat ini toko Anda buka ?
                                            </p>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="is_store_open" id="openStoreTrue"
                                                    class="custom-control-input" value="true" />
                                                <label for="openStoreTrue" class="custom-control-label">Buka</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="is_store_open" id="openStoreFalse"
                                                    class="custom-control-input" value="false" />
                                                <label for="openStoreFalse" class="custom-control-label">Sementara
                                                    Tutup</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

