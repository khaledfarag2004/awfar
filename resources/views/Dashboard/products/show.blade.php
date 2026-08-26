@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">Product Details</h1>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to Products
                </a>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-box"></i> بيانات المنتج</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $product->id }}</td></tr>
                        <tr><th>Name</th><td>{{ $product->name }}</td></tr>
                        <tr><th>Description</th><td>{{ $product->description }}</td></tr>
                        <tr><th>Price</th><td>{{ $product->price }} SAR</td></tr>
                        <tr><th>Category</th><td>{{ $product->category->name ?? 'N/A' }}</td></tr>
                        <tr><th>Brand</th><td>{{ $product->brand->name ?? 'N/A' }}</td></tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($product->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr><th>Image</th><td><img src="{{ asset($product->image) }}" width="120"></td></tr>
                        <tr><th>Created At</th><td>{{ $product->created_at->format('Y-m-d H:i') }}</td></tr>
                        <tr><th>Updated At</th><td>{{ $product->updated_at->format('Y-m-d H:i') }}</td></tr>
                    </table>

                </div>
            </div>
        </div>
    </main>
@endsection
