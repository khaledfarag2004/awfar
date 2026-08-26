@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <h1 class="h3 mb-1">Add City</h1>
            <a href="{{ route('cities.index') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-arrow-left"></i> Back</a>

            <form class="panel mt-3" method="POST" action="{{ route('cities.store') }}">
                @csrf
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">City Name</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Create City</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
