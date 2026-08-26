@extends('Dashboard.index')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <!-- Heading -->
            <div class="page-heading d-flex justify-content-between align-items-center">
                <div class="page-heading-copy d-flex align-items-center gap-2">
                    <span class="page-icon"><i class="bi bi-info-circle" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">About Details</h1>
                        <p class="text-muted mb-0">Details</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('about.index') }}">
                        <i class="bi bi-arrow-left"></i> Back to About List
                    </a>
                </div>
            </div>

            <!-- Panel -->
            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-card-text"></i> About Details</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $about->id }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <img src="{{ asset('images/' . $about->image) }}"
                                     alt="About Image"
                                     class="img-thumbnail"
                                     style="width:150px;">
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $about->description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($about->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Not Active</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $about->created_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $about->updated_at->format('Y-m-d') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer text-end">
                    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                </div>
            </div>

        </div>
    </main>
@endsection
