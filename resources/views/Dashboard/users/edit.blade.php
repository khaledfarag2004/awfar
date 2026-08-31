@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-pencil-square" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                        <h1 class="h3 mb-1">{{ __("messages.edit_user") }}</h1>
                        <p class="text-muted mb-0">{{ __("messages.update_user_account") }}</p>
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
                    <form class="panel needs-validation" method="POST" action="{{ route('user.update', ['locale' => app()->getLocale(), 'user' => $user->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="panel-header">
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-person"></i> {{ __("messages.user_information") }}</h2>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">{{ __("messages.name") }}</label>
                                <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phone">{{ __("messages.phone") }}</label>
                                <input class="form-control" id="phone" name="phone" type="tel" value="{{ old('phone', $user->phone) }}" required>
                            </div>

                           <div class="col-md-6">
                                <label class="form-label" for="city_id">{{ __("messages.city") }}</label>
                                <select class="form-select" id="city_id" name="city_id" required>
                                    <option value="">{{ __("messages.choose_city") }}</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="is_blocked">{{ __("messages.is_blocked") }}</label>
                                <select class="form-select" id="is_blocked" name="is_blocked" required>
                                    <option value="">{{ __("messages.choose_status") }}</option>
                                    <option value="1" {{ old('is_blocked', $user->is_blocked) == 1 ? 'selected' : '' }}>{{ __("messages.blocked") }}</option>
                                    <option value="0" {{ old('is_blocked', $user->is_blocked) == 0 ? 'selected' : '' }}>{{ __("messages.not_blocked") }}</option>
                                </select>
                                <div class="invalid-feedback">{{ __("messages.choose_status") }}</div>
                            </div>


                            <div class="col-md-6">
                                <label class="form-label" for="email">{{ __("messages.email") }}</label>
                                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password">{{ __("messages.password") }}</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="{{ __("messages.leave_blank_password") }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="type">{{ __("messages.type") }}</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="">{{ __("messages.choose_role") }}</option>
                                    <option value="client" {{ $user->type == 'client' ? 'selected' : '' }}>{{ __("messages.client") }}</option>
                                    <option value="delivery" {{ $user->type == 'delivery' ? 'selected' : '' }}>{{ __("messages.delivery") }}</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="is_active">{{ __("messages.status") }}</label>
                                <select class="form-select" id="is_active" name="is_active" required>
                                    <option value="">{{ __("messages.choose_status") }}</option>
                                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                                    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>{{ __("messages.inactive") }}</option>
                                </select>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> {{ __("messages.update_user") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
