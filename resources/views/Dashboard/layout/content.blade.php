@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Overview</p>
                        <h1 class="h3 mb-1">Dashboard</h1>
                        <p class="text-muted mb-0">Monitor performance, sales, users, and support from one clean workspace.</p>
                    </div>
                </div>
            </div>

            <section class="row g-3 mt-1" aria-label="Dashboard metrics">
                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-primary">
                        <div class="metric-top">
                            <span class="metric-label">Users Count..</span>
                            <span class="metric-icon"><i class="bi bi-currency-dollar" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $UserCount }}</div>

                    </article>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-success">
                        <div class="metric-top">
                            <span class="metric-label">Proudacts Count</span>
                            <span class="metric-icon"><i class="bi bi-bag-check" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $ProudactCount }}</div>

                    </article>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-warning">
                        <div class="metric-top">
                            <span class="metric-label">Brand Count</span>
                            <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $brandCount }}</div>
                    </article>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <article class="metric-card metric-danger">
                        <div class="metric-top">
                            <span class="metric-label">Categorie Count</span>
                            <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
                        </div>
                        <div class="metric-value">{{ $categoriesCount }}</div>

                    </article>
                </div>
            </section>








            <section class="panel mt-3">
                <div class="panel-header">
                    <div>
                        <h2 class="h5 mb-1 section-title"><i class="bi bi-people" aria-hidden="true"></i><span>Recent Users</span></h2>
                        <p class="text-muted mb-0">Latest account activity across the workspace.</p>
                    </div>
                    <a class="btn btn-outline-secondary btn-sm" href="">Manage Users</a>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead><tr><th scope="col">User</th><th scope="col">Role</th><th scope="col">Status</th><th scope="col">Joined</th><th scope="col" class="text-end">Action</th></tr></thead>
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
                                    @if($user->is_active)
                                        <span class="badge text-bg-success">
            Verified
        </span>
                                    @else
                                        <span class="badge text-bg-warning">
            Unverified
        </span>
                                    @endif
                                </td>

                                <td>{{ $user->created_at }}
                                <p>{{ $user->updated_at }}</p>
                                </td>
                                <td class="text-end"><a class="btn btn-light btn-sm" href="user-details.html">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>


                    </table>
                </div>
            </section>
        </div>
    </main>

@endsection
