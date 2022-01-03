@extends('admin.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Search Categories</h1>
        </div>
        <form class="form-inline" action="" method="GET">
            <div class="form-group mb-2">
                <input type="text" name="search" class="form-control ml-2" placeholder="Categorie Name">
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2"><i class="fa fa-search"></i> Find</button>
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary mb-2 ml-2"><i
                    class="fa fa-plus"></i> Add new data</a>
        </form>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image Icon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $data )
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $data->title }}</td>
                        <td><img src="{{ url('storage/' . $data->image_categories) }}" alt="" width="200" height="200">
                        </td>
                        <td><a href="{{ route('categories.edit', $data->id) }}" class="btn btn-warning">Edit</a> <br><br>
                            <form action="{{ route('categories.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" align="center">No Data</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div>
            {{ $categories->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
