@extends('Dashboard.index')
@section('content')
    <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-1">{{ __("messages.edit_product") }}</h1>
                <a href="{{ route('products.index', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> {{ __("messages.back_to_products") }}
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger p-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="panel needs-validation mt-3" method="POST" action="{{ route('products.update', ['locale' => app()->getLocale(), 'product' => $product->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel-header">
                    <h2 class="h5 mb-1 section-title"><i class="bi bi-box-seam"></i> {{ __("messages.product_information") }}</h2>
                </div>
                <div class="panel-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.name") }}</label>
                        <input class="form-control" name="name" type="text" value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __("messages.price_before_discount") }}</label>
                        <input class="form-control" id="price_before" name="price_before_discount" type="number" step="0.01"
                               value="{{ old('price_before_discount', $product->price_before_discount) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __("messages.discount_amount") }}</label>
                        <input class="form-control" id="discount_amount" type="number" step="0.01"
                               value="{{ old('discount_amount', 0) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __("messages.price_after_discount") }}</label>
                        <input class="form-control" id="price_after" name="price_after_discount" type="number" step="0.01"
                               value="{{ old('price_after_discount', $product->price_after_discount) }}" readonly>
                    </div>

                    <script>
                        const priceBefore = document.getElementById('price_before');
                        const discountAmount = document.getElementById('discount_amount');
                        const priceAfter = document.getElementById('price_after');

                        function updatePrice() {
                            let before = parseFloat(priceBefore.value) || 0;
                            let discount = parseFloat(discountAmount.value) || 0;
                            priceAfter.value = (before - discount).toFixed(2);
                        }

                        priceBefore.addEventListener('input', updatePrice);
                        discountAmount.addEventListener('input', updatePrice);
                    </script>

                    <div class="col-md-12">
                        <label class="form-label">{{ __("messages.description") }}</label>
                        <textarea class="form-control" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.category") }}</label>
                        <select class="form-select" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.brand") }}</label>
                        <select class="form-select" name="brand_id" required>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __("messages.quantity") }}</label>
                        <input class="form-control" id="quantity" name="quantity" type="number" min="1"
                               value="{{ old('quantity', $product->quantity) }}" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">{{ __("messages.total_price_auto") }}</label>
                        <input class="form-control" id="total_price" type="number" step="0.01" readonly>
                    </div>

                    <script>
                        const priceBefore = document.getElementById('price_before');
                        const discountAmount = document.getElementById('discount_amount');
                        const priceAfter = document.getElementById('price_after');
                        const quantity = document.getElementById('quantity');
                        const totalPrice = document.getElementById('total_price');

                        function updatePrice() {
                            let before = parseFloat(priceBefore.value) || 0;
                            let discount = parseFloat(discountAmount.value) || 0;
                            let after = before - discount;
                            priceAfter.value = after.toFixed(2);

                            let qty = parseInt(quantity.value) || 1;
                            totalPrice.value = (after * qty).toFixed(2);
                        }

                        priceBefore.addEventListener('input', updatePrice);
                        discountAmount.addEventListener('input', updatePrice);
                        quantity.addEventListener('input', updatePrice);

                        updatePrice();
                    </script>


                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.status") }}</label>
                        <select class="form-select" name="status" required>
                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                            <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>{{ __("messages.inactive") }}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __("messages.image") }}</label>
                        <input class="form-control" type="file" name="image">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ __("messages.product_image") }}" width="100" class="mt-2">
                        @endif
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> {{ __("messages.update_product") }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
