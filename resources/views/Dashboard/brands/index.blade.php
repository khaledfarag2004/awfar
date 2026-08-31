@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.brands_dashboard") }}</h1>
                <a href="{{ route('brands.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> {{ __("messages.add_brand") }}
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-building"></i> {{ __("messages.brands_list") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <th>{{ __("messages.name") }}</th>
                            <th>{{ __("messages.logo") }}</th>
                            <th>{{ __("messages.status") }}</th>
                            <th>{{ __("messages.created_at") }}</th>
                            <th>{{ __("messages.actions") }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td><img src="{{ asset($brand->logo) }}" width="100"></td>
                                <td>
                                    @if($brand->status)
                                        <span class="badge bg-success">{{ __("messages.active") }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __("messages.inactive") }}</span>
                                    @endif
                                </td>
                                <td>{{ $brand->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('brands.edit', ['locale' => app()->getLocale(), 'brand' => $brand->id]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('brands.destroy', ['locale' => app()->getLocale(), 'brand' => $brand->id]) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $brands->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </main>
@endsection
