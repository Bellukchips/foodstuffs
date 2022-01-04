@extends('user.dashboard.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Shirup Marzan</h2>
            <p class="dashboard-subtitle">Product Details</p>
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
                    <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Product_Name">Product Name</label>
                                            <input type="text" name="name" id="" value="{{ $data->name ?? old('name') }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="number" name="price" value="{{ $data->price ?? old('price') }}"
                                                id="Price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Category">Categories</label>
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
                                            <textarea name="desc" id="desc" cols="30" rows="3"
                                                class="form-control">{{ strip_tags($data->desc) ?? old('desc') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <img src="{{ url('storage/' . $data->thumbnail) }}" width="300" height="200"
                                                alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Thumbnails</label>
                                            <p class="text-muted">Select File</p>
                                            <input name="thumbnail" type="file" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-block">
                                            Update Product
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
