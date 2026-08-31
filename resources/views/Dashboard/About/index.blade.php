@extends('Dashboard.index')

@section('content')
        <main class="dashboard-content">
            <div class="container-fluid px-3 px-lg-4 py-2">

                <!-- Heading -->
                <div class="page-heading mb-2 d-flex justify-content-between align-items-center">
                    <div class="page-heading-copy d-flex align-items-center gap-2">
                        <span class="page-icon"><i class="bi bi-receipt" aria-hidden="true"></i></span>
                        <div>
                            <p class="eyebrow mb-1">{{ __("messages.management") }}</p>
                            <h1 class="h3 mb-1">{{ __("messages.about") }}</h1>
                            <p class="text-muted mb-0">{{ __("messages.read_all_about") }}</p>
                        </div>
                    </div>
                </div>

                <!-- About list -->
                <section class="panel mt-2">
                    <div class="panel-header d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-table"></i> {{ __("messages.about_list") }}
                            </h2>
                            <p class="text-muted mb-0">{{ __("messages.manage_read_about") }}</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered align-middle mb-0 shadow-sm" id="aboutTable">
                            <thead class="table-dark">
                            <tr>
                                <th>{{ __("messages.id") }}</th>
                                <th>{{ __("messages.image") }}</th>
                                <th>{{ __("messages.description") }}</th>
                                <th>{{ __("messages.status") }}</th>
                                <th>{{ __("messages.created") }}</th>
                                <th>{{ __("messages.updated") }}</th>
                                <th class="text-center">{{ __("messages.actions") }}</th>
                            </tr>
                            </thead>
                            @php
                                use Illuminate\Support\Str;
                            @endphp
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $about->image) }}"
                                             alt="{{ __("messages.image") }}"
                                             class="img-thumbnail"
                                             style="width: 80px; height: auto;">
                                    </td>
                                    <td>{{ Str::words($about->description, 50, '...') }}</td>
                                    <td>
                                        @if($about->status == 1)
                                            <span class="badge bg-success">{{ __("messages.active") }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __("messages.not_active") }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $about->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $about->updated_at->format('Y-m-d') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('about.show', ['locale' => app()->getLocale(), 'about' => $about->id]) }}" class="btn btn-info btn-sm me-1">
                                            <i class="bi bi-eye"></i> {{ __("messages.view") }}
                                        </a>
                                        <a href="{{ route('about.edit', ['locale' => app()->getLocale(), 'about' => $about->id]) }}" class="btn btn-warning btn-sm me-1">
                                            <i class="bi bi-pencil-square"></i> {{ __("messages.edit") }}
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </main>
@endsection
