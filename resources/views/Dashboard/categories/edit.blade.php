@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.edit_category") }}</h1>
                <a href="{{ route('categories.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_categories") }}
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

            <form class="panel mt-3" method="POST" action="{{ route('categories.update', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-tag"></i> {{ __("messages.category_information") }}</h2>
                </div>
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.name") }}</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name', $category->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="status">{{ __("messages.status") }}</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">{{ __("messages.choose_status") }}</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>{{ __("messages.inactive") }}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="image">{{ __("messages.image") }}</label>
                        <input class="form-control" id="image" name="image" type="file">
                        @if($category->image)
                            <div class="mt-2">
                                <img src="{{ asset($category->image) }}" alt="{{ __("messages.current_image") }}" class="img-thumbnail" style="width:120px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> {{ __("messages.update_category") }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
