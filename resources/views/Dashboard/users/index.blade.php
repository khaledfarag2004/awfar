@extends('Dashboard.index')
@section('content')
    <div class="admin-main">
        <main class="dashboard-content">
            <div class="container-fluid px-3 px-lg-4 py-2">

                <!-- Heading -->
                <div class="page-heading mb-2 d-flex justify-content-between align-items-center">
                    <div class="page-heading-copy d-flex align-items-center gap-2">
                        <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                        <div>
                            <p class="eyebrow mb-1">Management</p>
                            <h1 class="h3 mb-1">Users</h1>
                            <p class="text-muted mb-0">Review accounts, roles, account status, and team ownership.</p>
                        </div>
                    </div>
                    <div class="heading-actions">
                        <a class="btn btn-primary btn-sm" href="{{ route('user.create') }}">
                            <i class="bi bi-person-plus" aria-hidden="true"></i> Add User
                        </a>
                    </div>
                </div>

                <!-- User summary -->
                <section class="row g-3 mt-2 mb-2" aria-label="User summary">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-primary">
                            <div class="metric-top">
                                <span class="metric-label">Total Users</span>
                                <span class="metric-icon"><i class="bi bi-people"></i></span>
                            </div>
                            <div class="metric-value">{{ $UserCount }}</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-success">
                            <div class="metric-top">
                                <span class="metric-label">Active</span>
                                <span class="metric-icon"><i class="bi bi-check2-circle"></i></span>
                            </div>
                            <div class="metric-value">{{ $ActiveUserCount }}</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-warning">
                            <div class="metric-top">
                                <span class="metric-label">Pending</span>
                                <span class="metric-icon"><i class="bi bi-hourglass-split"></i></span>
                            </div>
                            <div class="metric-value">{{ $PendingUserCount }}</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-danger">
                            <div class="metric-top">
                                <span class="metric-label">Blocked User</span>
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
                                <i class="bi bi-table"></i> User List
                            </h2>
                            <p class="text-muted mb-0">Search, review, and manage team member accounts.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <input class="form-control form-control-sm table-search" type="search"
                                   placeholder="Search users" data-table-search="usersTable" aria-label="Search users">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Blocked</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th class="text-end">Action</th>
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
                                            <span class="badge bg-danger">Blocked</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->is_active == 1)
                                            <span class="badge text-bg-success">Active</span>
                                        @else
                                            <span class="badge text-bg-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-light btn-sm me-1" href="{{ route('user.show', $user->id) }}">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <a class="btn btn-warning btn-sm me-1" href="{{ route('user.edit', $user->id) }}">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟')">
                                                <i class="bi bi-trash"></i> Delete
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
    </div>
@endsection
