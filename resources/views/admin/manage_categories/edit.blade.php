@extends('admin.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create categorie</h1>
        </div>
        <!-- Alert errors
                    -->
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
        </div>
        <form action="{{ route('categories.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="input">Title</label>
                <input type="text" class="form-control" name="title" id="input" placeholder="Title categorie"
                    value="{{ $data->title ?? old('title') }}">
            </div>
            <div class="form-group">
                <label for="input">Image</label>
                <input name="image_categories" class="form-control" type="file" placeholder="Image Categorie">
            </div>
            <div class="form-group">
                <img src="{{ url('storage/' . $data->image_categories) }}" alt="" width="200" height="200">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
