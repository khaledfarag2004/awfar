@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">Add Product</h1>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to Products
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="panel needs-validation mt-3" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-box-seam"></i> Product Information</h2>
                </div>
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Price</label>
                        <input class="form-control" name="price" type="number" step="0.01" value="{{ old('price') }}" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Brand</label>
                        <select class="form-select" name="brand_id" required>
                            <option value="">Choose brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Image</label>
                        <input class="form-control" type="file" name="image">
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-save"></i> Create Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
