@extends('Dashboard.index')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <div class="page-heading d-flex justify-content-between align-items-center">
                <div class="page-heading-copy d-flex align-items-center gap-2">
                    <span class="page-icon"><i class="bi bi-file-text" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                        <h1 class="h3 mb-1">{{ __("messages.terms") }}</h1>
                        <p class="text-muted mb-0">{{ __("messages.manage_read_terms") }}</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a href="{{ route('terms.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success btn-sm">
                        <i class="bi bi-plus-circle"></i> {{ __("messages.add_new") }}
                    </a>
                </div>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-table"></i> {{ __("messages.terms_list") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <th>{{ __("messages.title") }}</th>
                            <th>{{ __("messages.description") }}</th>
                            <th>{{ __("messages.status") }}</th>
                            <th>{{ __("messages.created") }}</th>
                            <th>{{ __("messages.updated") }}</th>
                            <th class="text-center">{{ __("messages.actions") }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($terms as $term)
                            <tr>
                                <td>{{ $term->id }}</td>
                                <td>{{ $term->title }}</td>
                                <td>{{ \Illuminate\Support\Str::words($term->description, 30, '...') }}</td>
                                <td>
                                    @if($term->status == 1)
                                        <span class="badge bg-success">{{ __("messages.active") }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __("messages.not_active") }}</span>
                                    @endif
                                </td>
                                <td>{{ $term->created_at->format('Y-m-d') }}</td>
                                <td>{{ $term->updated_at->format('Y-m-d') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('terms.show', ['locale' => app()->getLocale(), 'term' => $term->id]) }}" class="btn btn-info btn-sm me-1">
                                        <i class="bi bi-eye"></i> {{ __("messages.view") }}
                                    </a>
                                    <a href="{{ route('terms.edit', ['locale' => app()->getLocale(), 'term' => $term->id]) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> {{ __("messages.edit") }}
                                    </a>
                                    <form action="{{ route('terms.destroy', ['locale' => app()->getLocale(), 'term' => $term->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> {{ __("messages.delete") }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection
