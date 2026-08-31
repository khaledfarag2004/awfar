@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.products_dashboard") }}</h1>
                <a href="{{ route('products.create', ['locale' => app()->getLocale()]) }}" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> {{ __("messages.add_product") }}
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <div class="panel mt-3">
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-box-seam"></i> {{ __("messages.products_list") }}</h2>
                </div>
                <div class="panel-body">
                    <table class="table align-middle mb-0">
                        <thead>
                        <tr>
                            <th>{{ __("messages.id") }}</th>
                            <th>{{ __("messages.name") }}</th>
                            <th>{{ __("messages.quantity") }}</th>
                            <th>{{ __("messages.current_price") }}</th>
                            <th>{{ __("messages.price_before_discount") }}</th>
                            <th>{{ __("messages.actions") }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    {{ $product->price_after_discount }} SAR
                                </td>
                                <td>
                                    {{ $product->price_before_discount }} SAR
                                </td>
                                <td>
                                    <a href="{{ route('products.show', ['locale' => app()->getLocale(), 'product' => $product->id]) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', ['locale' => app()->getLocale(), 'product' => $product->id]) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', ['locale' => app()->getLocale(), 'product' => $product->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
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
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
