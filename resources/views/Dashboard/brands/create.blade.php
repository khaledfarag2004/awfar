@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <h1 class="h3 mb-1">{{ __("messages.add_brand") }}</h1>
            <a href="{{ route('brands.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> {{ __("messages.back") }}</a>

            <form class="panel mt-3" method="POST" action="{{ route('brands.store', ['locale' => app()->getLocale()]) }}" enctype="multipart/form-data">
                @csrf
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.name") }}</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.logo") }}</label>
                        <input class="form-control" type="file" name="logo" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.status") }}</label>
                        <select class="form-select" name="status" required>
                            <option value="1">{{ __("messages.active") }}</option>
                            <option value="0">{{ __("messages.inactive") }}</option>
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> {{ __("messages.create_brand") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
