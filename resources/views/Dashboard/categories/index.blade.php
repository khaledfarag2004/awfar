@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">Categories Dashboard</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Add Category
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-tags"></i> Categories List</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset($category->image) }}" alt="Category Image" width="60" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if($category->status == 1)
                                        <span class="badge text-bg-success">Active</span>
                                    @else
                                        <span class="badge text-bg-warning">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3 d-flex justify-content-center">
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                                   </div>
            </div>
        </div>
    </main>
@endsection
