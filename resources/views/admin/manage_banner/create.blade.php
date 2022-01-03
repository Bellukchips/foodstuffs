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
        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="input">Title</label>
                <input type="text" class="form-control" name="title" id="input" placeholder="Title banner" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="input">Image</label>
                <input name="img_banner" class="form-control" type="file" placeholder="Image Banner">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
