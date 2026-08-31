@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <h1 class="h3 mb-1">{{ __("messages.cities_dashboard") }}</h1>
            <a href="{{ route('cities.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> {{ __("messages.add_city") }}</a>

            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="panel mt-3">
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>{{ __("messages.id") }}</th>
                        <th>{{ __("messages.name") }}</th>
                        <th>{{ __("messages.created_at") }}</th>
                        <th>{{ __("messages.updated_at") }}</th>
                        <th>{{ __("messages.actions") }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $city->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('cities.edit', ['locale' => app()->getLocale(), 'city' => $city->id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('cities.destroy', ['locale' => app()->getLocale(), 'city' => $city->id]) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $cities->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </main>
@endsection
