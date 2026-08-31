@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.banners_dashboard") }}</h1>
                <a href="{{ route('banners.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> {{ __("messages.add_banner") }}
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-images"></i> {{ __("messages.banners_list") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <th>{{ __("messages.image") }}</th>
                            <th>{{ __("messages.created_at") }}</th>
                            <th>{{ __("messages.actions") }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                                <td><img src="{{ asset($banner->image) }}" width="150"></td>
                                <td>{{ $banner->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('banners.edit', ['locale' => app()->getLocale(), 'banner' => $banner->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('banners.destroy', ['locale' => app()->getLocale(), 'banner' => $banner->id]) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $banners->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
