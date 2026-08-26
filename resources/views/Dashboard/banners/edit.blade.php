@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">Edit Banner</h1>
                <a href="{{ route('banners.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Back to Banners
                </a>
            </div>

            <form class="panel mt-3" method="POST" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-image"></i> Banner Information</h2>
                </div>
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Banner Image</label>
                        <input class="form-control" type="file" name="image">
                        @if($banner->image)
                            <img src="{{ asset($banner->image) }}" width="150" class="mt-2">
                        @endif
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Update Banner
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
