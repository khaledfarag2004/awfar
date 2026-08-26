@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Add User</h1>
                        <p class="text-muted mb-0">Create a new user account with role and team assignments.</p>
                    </div>
                </div>
                <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="{{ route('user.index') }}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Users</a></div>
            </div>

            @csrf
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
                    <form class="panel needs-validation" method="POST" action="{{ route('user.store') }}">
                        @csrf
                        @method('POST')
                        <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus" aria-hidden="true"></i><span>User Information</span></h2><p class="text-muted mb-0">Create a user account with validated fields.</p></div></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">name</label>
                                <input class="form-control" id="name" name="name" type="text" required>
                                <div class="invalid-feedback">name</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phone">phone</label>
                                <input class="form-control" id="phone" name="phone" type="tel" required>
                                <div class="invalid-feedback"> phone</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="city_id">city</label>
                                <select class="form-select" id="city_id" name="city_id" required>
                                    <option value="">choose city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">email</label>
                                <input class="form-control" id="email" name="email" type="email" required>
                                <div class="invalid-feedback">email</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">password</label>
                                <input class="form-control" id="password" name="password" type="password" required>
                                <div class="invalid-feedback">password</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="type">type</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="">choose role</option>
                                    <option value="admin">admin</option>
                                    <option value="client">client</option>
                                    <option value="delivery">delivery</option>
                                </select>
                                <div class="invalid-feedback">يجب اختيار الفريق.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="is_active">is_active</label>
                                <select class="form-select" id="is_active" name="is_active" required>
                                    <option value="">choose status</option>
                                    <option value="1">active</option>
                                    <option value="0">disactive </option>
                                </select>
                                <div class="invalid-feedback">يجب اختيار الحالة.</div>
                            </div>


                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bx bx-save"></i> Create User
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="panel h-100">
                        <h2 class="h5 mb-3 section-title"><i class="bi bi-list-check" aria-hidden="true"></i><span>Access Checklist</span></h2>
                        <div class="activity-list">
                            <div class="activity-item"><span class="activity-dot bg-success"></span><div><p class="mb-1 fw-semibold">Assign role</p><p class="text-muted small mb-0">Start with the least privileged role.</p></div></div>
                            <div class="activity-item"><span class="activity-dot bg-primary"></span><div><p class="mb-1 fw-semibold">Add team</p><p class="text-muted small mb-0">Team ownership controls dashboards.</p></div></div>
                            <div class="activity-item"><span class="activity-dot bg-warning"></span><div><p class="mb-1 fw-semibold">Send invite</p><p class="text-muted small mb-0">Users receive activation by email.</p></div></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
