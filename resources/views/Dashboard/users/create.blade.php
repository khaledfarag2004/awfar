@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-person-plus"></i></span>
                    <div>
                        <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                        <h1 class="h3 mb-1">{{ __("messages.add_user") }}</h1>
                        <p class="text-muted mb-0">{{ __("messages.create_new_user") }}</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('user.index', ['locale' => app()->getLocale()]) }}">
                        <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_users") }}
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
                    <form class="panel needs-validation" method="POST" action="{{ route('user.store', ['locale' => app()->getLocale()]) }}">
                        @csrf
                        <div class="panel-header">
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-person-plus"></i> {{ __("messages.user_information") }}
                            </h2>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">{{ __("messages.name") }}</label>
                                <input class="form-control" id="name" name="name" type="text"
                                       value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phone">{{ __("messages.phone") }}</label>
                                <input class="form-control" id="phone" name="phone" type="tel"
                                       value="{{ old('phone') }}" required>
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="city_id">{{ __("messages.city") }}</label>
                                <select class="form-select" id="city_id" name="city_id" required>
                                    <option value="">{{ __("messages.choose_city") }}</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">{{ __("messages.email") }}</label>
                                <input class="form-control" id="email" name="email" type="email"
                                       value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password">{{ __("messages.password") }}</label>
                                <input class="form-control" id="password" name="password" type="password" required>
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="type">{{ __("messages.type") }}</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="">{{ __("messages.choose_role") }}</option>
                                    <option value="client" {{ old('type') == 'client' ? 'selected' : '' }}>{{ __("messages.client") }}</option>
                                    <option value="delivery" {{ old('type') == 'delivery' ? 'selected' : '' }}>{{ __("messages.delivery") }}</option>
                                </select>
                                @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="is_active">{{ __("messages.status") }}</label>
                                <select class="form-select" id="is_active" name="is_active" required>
                                    <option value="">{{ __("messages.choose_status") }}</option>
                                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>{{ __("messages.inactive") }}</option>
                                </select>
                                @error('is_active') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bx bx-save"></i> {{ __("messages.create_user") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="panel h-100">
                        <h2 class="h5 mb-3 section-title">
                            <i class="bi bi-list-check"></i> {{ __("messages.access_checklist") }}
                        </h2>
                        <div class="activity-list">
                            <div class="activity-item">
                                <span class="activity-dot bg-success"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">{{ __("messages.assign_role") }}</p>
                                    <p class="text-muted small mb-0">{{ __("messages.least_privileged_role") }}</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <span class="activity-dot bg-primary"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">{{ __("messages.add_team") }}</p>
                                    <p class="text-muted small mb-0">{{ __("messages.team_ownership_controls") }}</p>
                                </div>
                            </div>
                            <div class="activity-item">
                                <span class="activity-dot bg-warning"></span>
                                <div>
                                    <p class="mb-1 fw-semibold">{{ __("messages.send_invite") }}</p>
                                    <p class="text-muted small mb-0">{{ __("messages.activation_by_email") }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
