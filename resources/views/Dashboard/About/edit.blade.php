@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-pencil-square" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                        <h1 class="h3 mb-1">{{ __("messages.edit_about") }}</h1>
                        <p class="text-muted mb-0">{{ __("messages.update_about_info") }}</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('about.index', ['locale' => app()->getLocale()]) }}">
                        <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_about_list") }}
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
                    <form class="panel needs-validation" method="POST" action="{{ route('about.update', ['locale' => app()->getLocale(), 'about' => $about->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="panel-header">
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-info-circle"></i> {{ __("messages.about_information") }}</h2>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label" for="description">{{ __("messages.description") }}</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $about->description) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="image">{{ __("messages.image") }}</label>
                                <input class="form-control" id="image" name="image" type="file">
                                @if($about->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/' . $about->image) }}" alt="{{ __("messages.current_image") }}" class="img-thumbnail" style="width:120px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="status">{{ __("messages.status") }}</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">{{ __("messages.choose_status") }}</option>
                                    <option value="1" {{ old('status', $about->status) == 1 ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                                    <option value="0" {{ old('status', $about->status) == 0 ? 'selected' : '' }}>{{ __("messages.not_active") }}</option>
                                </select>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> {{ __("messages.update_about") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
