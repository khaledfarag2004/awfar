@extends('Dashboard.index')

@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">

            <!-- Heading -->
            <div class="page-heading d-flex justify-content-between align-items-center">
                <div class="page-heading-copy d-flex align-items-center gap-2">
                    <span class="page-icon"><i class="bi bi-info-circle" aria-hidden="true"></i></span>
                    <div>
                        <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                        <h1 class="h3 mb-1">{{ __("messages.about_details") }}</h1>
                        <p class="text-muted mb-0">{{ __("messages.details") }}</p>
                    </div>
                </div>
                <div class="heading-actions">
                    <a class="btn btn-outline-secondary btn-sm" href="{{ route('about.index', ['locale' => app()->getLocale()]) }}">
                        <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_about_list") }}
                    </a>
                </div>
            </div>

            <!-- Panel -->
            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-card-text"></i> {{ __("messages.about_details") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <td>{{ $about->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.image") }}</th>
                            <td>
                                <img src="{{ asset('images/' . $about->image) }}"
                                     alt="{{ __("messages.image") }}"
                                     class="img-thumbnail"
                                     style="width:150px;">
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.description") }}</th>
                            <td>{{ $about->description }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.status") }}</th>
                            <td>
                                @if($about->status == 1)
                                    <span class="badge bg-success">{{ __("messages.active") }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __("messages.not_active") }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.created_at") }}</th>
                            <td>{{ $about->created_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>{{ __("messages.updated_at") }}</th>
                            <td>{{ $about->updated_at->format('Y-m-d') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer text-end">
                    <a href="{{ route('about.edit', ['locale' => app()->getLocale(), 'about' => $about->id]) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> {{ __("messages.edit") }}
                    </a>
                </div>
            </div>

        </div>
    </main>
@endsection
