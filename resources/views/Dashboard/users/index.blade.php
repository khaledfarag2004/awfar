@extends('Dashboard.index')
@section('content')
    <div class="admin-main">

        <main class="dashboard-content">
            <div class="container-fluid px-3 px-lg-4 py-4">

                <div class="page-heading">
                    <div class="page-heading-copy">
                        <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                        <div>
                            <p class="eyebrow mb-1">Management</p>
                            <h1 class="h3 mb-1">Users</h1>
                            <p class="text-muted mb-0">Review accounts, roles, account status, and team ownership.</p>
                        </div>
                    </div>
                    <div class="heading-actions"><a class="btn btn-primary btn-sm" href="{{ route('user.create') }}"><i class="bi bi-person-plus" aria-hidden="true"></i> Add User</a></div>
                </div>

                <section class="row g-3 mt-1" aria-label="User summary">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-primary">
                            <div class="metric-top">
                                <span class="metric-label">Total Users</span>
                                <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                            </div>
                            <div class="metric-value">{{ $UserCount }}</div>

                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-success">
                            <div class="metric-top">
                                <span class="metric-label">Active</span>
                                <span class="metric-icon"><i class="bi bi-check2-circle" aria-hidden="true"></i></span>
                            </div>
                            <div class="metric-value">{{ $ActiveUserCount }}</div>

                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-warning">
                            <div class="metric-top">
                                <span class="metric-label">Pending</span>
                                <span class="metric-icon"><i class="bi bi-hourglass-split" aria-hidden="true"></i></span>
                            </div>
                            <div class="metric-value">{{ $PendingUserCount }}</div>

                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-danger">
                            <div class="metric-top">
                                <span class="metric-label">Bloced User</span>
                                <span class="metric-icon"><i class="bi bi-slash-circle" aria-hidden="true"></i></span>
                            </div>
                            <div class="metric-value">{{ $BlocedUserCount }}</div>

                        </article>
                    </div>
                </section>

                <section class="panel mt-3">
                    <div class="panel-header">
                        <div>
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>User List</span></h2>
                            <p class="text-muted mb-0">Search, review, and manage team member accounts.</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <input class="form-control form-control-sm table-search" type="search" placeholder="Search users" data-table-search="usersTable" aria-label="Search users">
                        </div>
                    </div>
                    <div class="table-responsive">

                        <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                            <thead><tr><th scope="col">User</th><th scope="col">Role</th><th scope="col">Blocked</th><th scope="col">Status</th><th scope="col">Joined</th><th scope="col" class="text-end">Action</th></tr></thead>
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
                                    @if($user->is_blocked == 1)
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-danger">Blocked</span>
                                        </td>
                                    @endif
                                @if($user->is_active == 1)
                                        <td>
                                            <span class="badge text-bg-success">Active</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge text-bg-warning">Disactive</span>
                                        </td>
                                        @endif
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-light btn-sm me-1" href="{{ route('user.show', $user->id) }}">
                                            <i class="bx bx-show"></i> View
                                        </a>

                                        <a class="btn btn-warning btn-sm me-1" href="{{ route('user.edit', $user->id) }}">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا المستخدم؟')">
                                                <i class="bx bx-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </section>

            </div>
        </main>

    </div>
@endsection
