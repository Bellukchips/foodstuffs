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
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Partner Name / Store Name</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($foodstuffs as $index => $data )
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->desc }}</td>
                        <td>{{ $data->categorie->name }}</td>
                        <td>{{ $data->partner->name }}</td>
                        <td><img src="{{ url('storage/' . $data->thumbnail) }}" alt="" width="100" height="100">
                        </td>
                        <td><a href="{{ route('foodstuffs.edit', $data->id) }}" class="btn btn-warning">Edit</a> <br><br>
                            <form action="{{ route('foodstuffs.destroy', $data->id) }}" method="POST">
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
                        <td colspan="8" align="center">No Data</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div>
            {{ $foodstuffs->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
