@extends('Dashboard.index')
@section('content')
        <main class="dashboard-content">
            <div class="container-fluid px-3 px-lg-4 py-2">

                <!-- Heading -->
                <div class="page-heading mb-2 d-flex justify-content-between align-items-center">
                    <div class="page-heading-copy d-flex align-items-center gap-2">
                        <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                        <div>
                            <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                            <h1 class="h3 mb-1">{{ __("messages.users") }}</h1>
                            <p class="text-muted mb-0">{{ __("messages.review_accounts") }}</p>
                        </div>
                    </div>
                    <div class="heading-actions">
                        <a class="btn btn-primary btn-sm" href="{{ route('user.create', ['locale' => app()->getLocale()]) }}">
                            <i class="bi bi-person-plus" aria-hidden="true"></i> {{ __("messages.add_user") }}
                        </a>
                    </div>
                </div>

                <!-- User summary -->
                <section class="row g-3 mt-2 mb-2" aria-label="User summary">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-primary">
                            <div class="metric-top">
                                <span class="metric-label">{{ __("messages.total_users") }}</span>
                                <span class="metric-icon"><i class="bi bi-people"></i></span>
                            </div>
                            <div class="metric-value">{{ $UserCount }}</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-success">
                            <div class="metric-top">
                                <span class="metric-label">{{ __("messages.active") }}</span>
                                <span class="metric-icon"><i class="bi bi-check2-circle"></i></span>
                            </div>
                            <div class="metric-value">{{ $ActiveUserCount }}</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-warning">
                            <div class="metric-top">
                                <span class="metric-label">{{ __("messages.pending") }}</span>
                                <span class="metric-icon"><i class="bi bi-hourglass-split"></i></span>
                            </div>
                            <div class="metric-value">{{ $PendingUserCount }}</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-danger">
                            <div class="metric-top">
                                <span class="metric-label">{{ __("messages.blocked_user") }}</span>
                                <span class="metric-icon"><i class="bi bi-slash-circle"></i></span>
                            </div>
                            <div class="metric-value">{{ $BlocedUserCount }}</div>
                        </article>
                    </div>
                </section>

                <!-- User list -->
                <section class="panel mt-2">
                    <div class="panel-header d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-table"></i> {{ __("messages.user_list") }}
                            </h2>
                            <p class="text-muted mb-0">{{ __("messages.search_review_manage") }}</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <input class="form-control form-control-sm table-search" type="search"
                                   placeholder="{{ __("messages.search_users") }}" data-table-search="usersTable" aria-label="Search users">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                            <thead>
                            <tr>
                                <th>{{ __("messages.user") }}</th>
                                <th>{{ __("messages.role") }}</th>
                                <th>{{ __("messages.role_blocked") }}</th>
                                <th>{{ __("messages.status") }}</th>
                                <th>{{ __("messages.joined") }}</th>
                                <th class="text-end">{{ __("messages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div>
                                                <p class="fw-semibold mb-0">{{ $user->name }}</p>
                                                <p class="text-muted small mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        @if($user->is_blocked == 1)
                                            <span class="badge bg-danger">{{ __("messages.blocked") }}</span>
                                        @else
                                            <span class="badge bg-success">{{ __("messages.active") }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->is_active == 1)
                                            <span class="badge text-bg-success">{{ __("messages.active") }}</span>
                                        @else
                                            <span class="badge text-bg-warning">{{ __("messages.inactive") }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-light btn-sm me-1" href="{{ route('user.show', ['locale' => app()->getLocale(), 'user' => $user->id]) }}">
                                            <i class="bi bi-eye"></i> {{ __("messages.view") }}
                                        </a>
                                        <a class="btn btn-warning btn-sm me-1" href="{{ route('user.edit', ['locale' => app()->getLocale(), 'user' => $user->id]) }}">
                                            <i class="bi bi-pencil"></i> {{ __("messages.edit") }}
                                        </a>
                                        <form action="{{ route('user.destroy', ['locale' => app()->getLocale(), 'user' => $user->id]) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('{{ __("messages.confirm_delete_user") }}')">
                                                <i class="bi bi-trash"></i> {{ __("messages.delete") }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2 d-flex justify-content-center">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </section>

            </div>
        </main>

@endsection