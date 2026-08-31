@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.product_details") }}</h1>
                <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_products") }}
                </a>
            </div>

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-box"></i> {{ __("messages.product_data") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr><th>{{ __("messages.id") }}</th><td>{{ $product->id }}</td></tr>
                        <tr><th>{{ __("messages.name") }}</th><td>{{ $product->name }}</td></tr>
                        <tr><th>{{ __("messages.description") }}</th><td>{{ $product->description }}</td></tr>
                        <tr><th>{{ __("messages.price_before_discount") }}</th><td>{{ $product->price_before_discount }} SAR</td></tr>
                        <tr><th>{{ __("messages.discount_amount") }}</th><td>{{ $product->price_before_discount - $product->price_after_discount }} SAR</td></tr>
                        <tr><th>{{ __("messages.price_after_discount") }}</th><td>{{ $product->price_after_discount }} SAR</td></tr>
                        <tr><th>{{ __("messages.quantity") }}</th><td>{{ $product->quantity }}</td></tr>
                        <tr><th>{{ __("messages.total_price") }}</th><td>{{ $product->price_after_discount * $product->quantity }} SAR</td></tr>
                        <tr><th>{{ __("messages.category") }}</th><td>{{ $product->category->name ?? __("messages.n_a") }}</td></tr>
                        <tr><th>{{ __("messages.brand") }}</th><td>{{ $product->brand->name ?? __("messages.n_a") }}</td></tr>
                        <tr>
                            <th>{{ __("messages.status") }}</th>
                            <td>
                                @if($product->status)
                                    <span class="badge bg-success">{{ __("messages.active") }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __("messages.inactive") }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr><th>{{ __("messages.image") }}</th><td><img src="{{ asset($product->image) }}" alt="{{ __("messages.product_image") }}" width="120"></td></tr>
                        <tr><th>{{ __("messages.created_at") }}</th><td>{{ $product->created_at->format('Y-m-d H:i') }}</td></tr>
                        <tr><th>{{ __("messages.updated_at") }}</th><td>{{ $product->updated_at->format('Y-m-d H:i') }}</td></tr>
                    </table>

                </div>
            </div>
        </div>
    </main>
@endsection
