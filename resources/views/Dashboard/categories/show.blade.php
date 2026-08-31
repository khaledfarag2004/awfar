@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.category_details") }}</h1>
                <a href="{{ route('categories.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_categories") }}
                </a>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-tag"></i> {{ __("messages.category_data") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr><th>{{ __("messages.id") }}</th><td>{{ $category->id }}</td></tr>
                        <tr><th>{{ __("messages.name") }}</th><td>{{ $category->name }}</td></tr>
                        <tr>
                            <th>{{ __("messages.image") }}</th>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset($category->image) }}" alt="{{ __("messages.image") }}" class="img-thumbnail" style="width:150px;">
                                @else
                                    <span class="text-muted">{{ __("messages.no_image") }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.status") }}</th>
                            <td>
                                @if($category->status)
                                    <span class="badge bg-success">{{ __("messages.active") }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __("messages.inactive") }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr><th>{{ __("messages.created_at") }}</th><td>{{ $category->created_at->format('Y-m-d H:i') }}</td></tr>
                        <tr><th>{{ __("messages.updated_at") }}</th><td>{{ $category->updated_at->format('Y-m-d H:i') }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
