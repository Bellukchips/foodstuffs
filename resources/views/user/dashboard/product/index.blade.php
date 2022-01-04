@extends('user.dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">My Products</h2>
            <p class="dashboard-subtitle">Manage it well and get money</p>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('product.create') }}">
                        <button class="btn btn-success px-5">
                            Add New Product
                        </button>
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                @forelse ($foodstuffs as $data )
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{ route('product.edit', $data->id) }}" class="card card-dashboard-product d-block">
                            <div class="card-body">
                                <img src="{{ url('storage/' . $data->thumbnail) }}" alt="" class="w-100 mb-2 " />
                                <div class="product-title">{{ $data->name }}</div>
                                <div class="product-category">{{ $data->categorie->title }}</div>

                            </div>
                        </a>
                        <form action="{{ route('product.destroy', $data->id) }}" method="POST"
                            class="card card-dashboard-product d-flex justify-content-center">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-toolbar position-absolute">
                                <div class="card-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </div>
                            </button>
                        </form>
                        <br><br>
                    </div>
                @empty
                    <div></div>
                @endforelse
            </div>

        </div>
        {{ $foodstuffs->links('vendor.pagination.bootstrap-4') }}

    </div>
@endsection
