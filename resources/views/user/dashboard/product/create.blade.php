@extends('user.dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create New Product</h2>
            <p class="dashboard-subtitle">Create your own product</p>
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
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" type="text" placeholder="Telur ayam" name="name"
                                                value="{{ old('name') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price (/kg)</label>
                                            <input class="form-control" type="number" name="price" placeholder="1000"
                                                value="{{ old('price') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="id_categorie">Categories</label>
                                            <select name="id_categorie" class="form-control">
                                                <option value="">Select Categories</option>
                                                @forelse ($categorie as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @empty
                                                    <option value="">Empty</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="desc" id="Description" cols="20" rows="100"
                                                class="form-control">{{ old('desc') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Thumbnails</label>
                                            <p class="text-muted">Select File</p>
                                            <input name="thumbnail" type="file" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-block">
                                            Save Product
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector("#Description")).catch(
            (error) => {
                console.error(error);
            }
        );
    </script>

@endsection
