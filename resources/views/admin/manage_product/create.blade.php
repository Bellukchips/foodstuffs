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
        <form action="{{ route('foodstuffs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="input">Name</label>
                <input type="text" class="form-control" name="name" id="input" placeholder="Foodstuffs Name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="input">Price</label>
                <input type="number" class="form-control" name="price" id="input" placeholder="120000" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="input">Categorie</label>
                <select name="categorie" id="" class="form-select">
                    <option value="">Select category</option>
                    @forelse ($categorie as $item)
                        <option value="{{ $item->title }}">{{ $item->title }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="input">Store Name / Partner Name</label>
                <select name="categorie" id="" class="form-select">
                    <option value="">Select partner</option>
                    @forelse ($partner as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option value="">Empty</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{ old('desc') }}</textarea>
            </div>
            <div class="form-group">
                <input name="thumbnail" class="form-control" type="file" placeholder="Image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection