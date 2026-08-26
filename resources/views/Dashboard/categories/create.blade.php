@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">Add Category</h1>
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to Categories
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

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="panel mt-3" method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-tag"></i> Category Information</h2>
                </div>
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Choose status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <div class="invalid-feedback">يجب اختيار الحالة.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="image">Image</label>
                        <input class="form-control" id="image" name="image" type="file" accept="image/*">
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-save"></i> Create Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
