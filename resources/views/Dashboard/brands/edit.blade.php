@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <h1 class="h3 mb-1">Edit Brand</h1>
            <a href="{{ route('brands.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>

            <form class="panel mt-3" method="POST" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name', $brand->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Logo</label>
                        <input class="form-control" type="file" name="logo">
                        @if($brand->logo)
                            <img src="{{ asset($brand->logo) }}" width="100" class="mt-2">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Update Brand</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
