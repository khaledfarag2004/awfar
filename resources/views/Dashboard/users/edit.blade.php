@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading">
                <div class="page-heading-copy">
                    <span class="page-icon"><i class="bi bi-pencil-square" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">Management</p>
                        <h1 class="h3 mb-1">Edit User</h1>
                        <p class="text-muted mb-0">Update user account information.</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('user.index') }}">
                        <i class="bi bi-arrow-left"></i> Back to Users
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
                    <form class="panel needs-validation" method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="panel-header">
                            <h2 class="h5 mb-1 section-title"><i class="bi bi-person"></i> User Information</h2>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control" id="phone" name="phone" type="tel" value="{{ old('phone', $user->phone) }}" required>
                            </div>

                           <div class="col-md-6">
                                <label class="form-label" for="city_id">City</label>
                                <select class="form-select" id="city_id" name="city_id" required>
                                    <option value="">Choose city</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="is_blocked">is_blocked</label>
                                <select class="form-select" id="is_blocked" name="is_blocked" required>
                                    <option value="">Choose status</option>
                                    <option value="1" {{ old('is_blocked', $user->is_blocked) == 1 ? 'selected' : '' }}>Blocked</option>
                                    <option value="0" {{ old('is_blocked', $user->is_blocked) == 0 ? 'selected' : '' }}>Not Blocked</option>
                                </select>
                                <div class="invalid-feedback">يجب اختيار حالة الحظر.</div>
                            </div>


                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Leave blank to keep current">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="type">Type</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="">Choose role</option>
                                    <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="client" {{ $user->type == 'client' ? 'selected' : '' }}>Client</option>
                                    <option value="delivery" {{ $user->type == 'delivery' ? 'selected' : '' }}>Delivery</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="is_active">Status</label>
                                <select class="form-select" id="is_active" name="is_active" required>
                                    <option value="">Choose status</option>
                                    <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </main>
@endsection
