@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.categories_dashboard") }}</h1>
                <a href="{{ route('categories.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> {{ __("messages.add_category") }}
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-tags"></i> {{ __("messages.categories_list") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <th>{{ __("messages.name") }}</th>
                            <th>{{ __("messages.image") }}</th>
                            <th>{{ __("messages.status") }}</th>
                            <th>{{ __("messages.created_at") }}</th>
                            <th>{{ __("messages.actions") }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{ asset($category->image) }}" alt="{{ __("messages.image") }}" width="60" class="img-thumbnail">
                                    @else
                                        <span class="text-muted">{{ __("messages.no_image") }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($category->status == 1)
                                        <span class="badge text-bg-success">{{ __("messages.active") }}</span>
                                    @else
                                        <span class="badge text-bg-warning">{{ __("messages.inactive") }}</span>
                                    @endif
                                </td>
                                <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('categories.show', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" class="btn btn-info btn-sm" title="{{ __("messages.view") }}">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('categories.edit', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" class="btn btn-warning btn-sm" title="{{ __("messages.edit") }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', ['locale' => app()->getLocale(), 'category' => $category->id]) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="{{ __("messages.delete") }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3 d-flex justify-content-center">
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                                   </div>
            </div>
        </div>
    </main>
@endsection
