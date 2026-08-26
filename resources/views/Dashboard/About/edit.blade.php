@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-pencil-square" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Edit About</h1>
                        <p class="text-muted mb-0">Update About information.</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('about.index') }}">
                        <i class="bi bi-arrow-left"></i> Back to About List
                    </a>
                </div>
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

            <section class="row g-3">
                <div class="col-12 col-xl-8">
                    <form class="panel needs-validation" method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="panel-header">
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-info-circle"></i> About Information</h2>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label" for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $about->description) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="image">Image</label>
                                <input class="form-control" id="image" name="image" type="file">
                                @if($about->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/' . $about->image) }}" alt="Current Image" class="img-thumbnail" style="width:120px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">Choose status</option>
                                    <option value="1" {{ old('status', $about->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $about->status) == 0 ? 'selected' : '' }}>Not Active</option>
                                </select>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Update About
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
