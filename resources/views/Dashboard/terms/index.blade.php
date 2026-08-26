@extends('Dashboard.index')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading d-flex justify-content-between align-items-center">
                <div class="page-heading-copy d-flex align-items-center gap-2">
                    <span class="page-icon"><i class="bi bi-file-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Terms</h1>
                        <p class="text-muted mb-0">Manage and read all terms.</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('terms.create') }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> Add New
                    </a>
                </div>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table"></i> Terms List</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($terms as $term)
                            <tr>
                                <td>{{ $term->id }}</td>
                                <td>{{ $term->title }}</td>
                                <td>{{ \Illuminate\Support\Str::words($term->description, 30, '...') }}</td>
                                <td>
                                    @if($term->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>{{ $term->created_at->format('Y-m-d') }}</td>
                                <td>{{ $term->updated_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('terms.show', $term->id) }}" class="btn btn-info btn-sm me-1">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <a href="{{ route('terms.edit', $term->id) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('terms.destroy', $term->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
