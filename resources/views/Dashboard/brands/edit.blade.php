@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <h1 class="h3 mb-1">{{ __("messages.edit_brand") }}</h1>
            <a href="{{ route('brands.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> {{ __("messages.back") }}</a>

            <form class="panel mt-3" method="POST" action="{{ route('brands.update', ['locale' => app()->getLocale(), 'brand' => $brand->id]) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.name") }}</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name', $brand->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.logo") }}</label>
                        <input class="form-control" type="file" name="logo">
                        @if($brand->logo)
                            <img src="{{ asset($brand->logo) }}" width="100" class="mt-2">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.status") }}</label>
                        <select class="form-select" name="status" required>
                            <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                            <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>{{ __("messages.inactive") }}</option>
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> {{ __("messages.update_brand") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
