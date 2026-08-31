@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.add_banner") }}</h1>
                <a href="{{ route('banners.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_banners") }}
                </a>
            </div>

            <form class="panel mt-3" method="POST" action="{{ route('banners.store', ['locale' => app()->getLocale()]) }}" enctype="multipart/form-data">
                @csrf
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-image"></i> {{ __("messages.banner_information") }}</h2>
                </div>
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.banner_image") }}</label>
                        <input class="form-control" type="file" name="image" required>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-save"></i> {{ __("messages.create_banner") }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
