@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-person" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">User Details</h1>
                        <p class="text-muted mb-0">Details</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('user.index') }}">
                        <i class="bi bi-arrow-left"></i> Back to Users
                    </a>
                </div>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-info-circle"></i>User Details</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $user->city->name}}</td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td>{{ $user->type }}</td>
                        </tr>
                        <tr>
                            <th>Country Code</th>
                            <td>{{ $user->country_code }}</td>
                        </tr>
                        <tr>
                            <th>Is Active</th>
                            <td>
                                @if($user->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Is Blocked</th>
                            <td>
                                @if($user->is_blocked)
                                    <span class="badge bg-danger">Blocked</span>
                                @else
                                    <span class="badge bg-success">Not Blocked</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{ $user->updated_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
