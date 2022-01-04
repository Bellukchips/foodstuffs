@extends('user.dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Settings</h2>
            <p class="dashboard-subtitle">Make store that profitable</p>
        </div>
        <div class="form-group">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('failedRequest'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('failedRequest') }}
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('saveStoreSettings') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Store Status</label>
                                            <p class="text-muted">
                                                Do you want to activate your store?
                                            </p>
                                            @if (count($checkPartner) == 0)
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="is_store_open" id="openStoreTrue"
                                                        class="custom-control-input" value="1" />
                                                    <label for="openStoreTrue" class="custom-control-label">Active</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="is_store_open" id="openStoreFalse"
                                                        class="custom-control-input" value="0" />
                                                    <label for="openStoreFalse"
                                                        class="custom-control-label">Inactive</label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" name="is_store_open" id="openStoreTrue"
                                                        class="custom-control-input" value="1" @if ($partner->is_open == 1)
                                                    checked
                                            @endif />
                                            <label for="openStoreTrue" class="custom-control-label">Active</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="is_store_open" id="openStoreFalse"
                                                class="custom-control-input" value="0" @if ($partner->is_open == 0)
                                            checked
                                            @endif />
                                            <label for="openStoreFalse" class="custom-control-label">Inactive</label>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Store Name</label>
                                        <input class="form-control" type="text" placeholder="Meat Store"
                                            value="{{ $partner->name ?? old('name') }}" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" class="form-control">
                                            @if (count($checkPartner) == 0)
                                                <option value="">Select category</option>
                                            @else
                                                <option value="{{ $partner->categories_partner }}">
                                                    {{ $partner->categories_partner }}</option>
                                            @endif
                                            @forelse ($categorie as $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @empty
                                                <option value="">Empty</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col text-right mt-3">
                                        <button type="submit" class="btn btn-success px-5">
                                            Save
                                        </button>
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
