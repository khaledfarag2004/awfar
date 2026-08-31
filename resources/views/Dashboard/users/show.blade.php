@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-person" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                        <h1 class="h3 mb-1">{{ __("messages.user_details") }}</h1>
                        <p class="text-muted mb-0">{{ __("messages.details") }}</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('user.index', ['locale' => app()->getLocale()]) }}">
                        <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_users") }}
                    </a>
                </div>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-info-circle"></i>{{ __("messages.user_details") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.name") }}</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.phone") }}</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.email") }}</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.city") }}</th>
                            <td>{{ $user->city->name}}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.type") }}</th>
                            <td>{{ $user->type }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.country_code") }}</th>
                            <td>{{ $user->country_code }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.is_active") }}</th>
                            <td>
                                @if($user->is_active)
                                    <span class="badge bg-success">{{ __("messages.active") }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __("messages.inactive") }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.is_blocked") }}</th>
                            <td>
                                @if($user->is_blocked)
                                    <span class="badge bg-danger">{{ __("messages.blocked") }}</span>
                                @else
                                    <span class="badge bg-success">{{ __("messages.not_blocked") }}</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>{{ __("messages.updated_at") }}</th>
                            <td>{{ $user->updated_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.created_at") }}</th>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
