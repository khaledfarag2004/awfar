@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">Category Details</h1>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to Categories
                </a>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-tag"></i> بيانات الكاتيجوري</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $category->id }}</td></tr>
                        <tr><th>Name</th><td>{{ $category->name }}</td></tr>
                        <tr><th>Created At</th><td>{{ $category->created_at->format('Y-m-d H:i') }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $category->updated_at->format('Y-m-d H:i') }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
