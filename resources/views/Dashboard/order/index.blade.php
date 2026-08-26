@extends('Dashboard.index')

@section('content')
        <main class="dashboard-content">
            <div class="container-fluid px-3 px-lg-4 py-2">

                <!-- Heading -->
                <div class="page-heading mb-2 d-flex justify-content-between align-items-center">
                    <div class="page-heading-copy d-flex align-items-center gap-2">
                        <span class="page-icon"><i class="bi bi-receipt" aria-hidden="true"></i></span>
                        <div>
                            <p class="eyebrow mb-1">Management</p>
                            <h1 class="h3 mb-1">Orders</h1>
                            <p class="text-muted mb-0">Review all orders, users, and totals.</p>
                        </div>
                    </div>
                </div>

                <!-- Summary cards -->
                <section class="row g-3 mt-2 mb-2">
                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-success">
                            <div class="metric-top">
                                <span class="metric-label">إجمالي الأرباح</span>
                                <span class="metric-icon"><i class="bi bi-cash-stack"></i></span>
                            </div>
                            <div class="metric-value">{{ number_format($totalRevenue, 2) }} ج.م</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-primary">
                            <div class="metric-top">
                                <span class="metric-label">أرباح آخر أسبوع</span>
                                <span class="metric-icon"><i class="bi bi-calendar-week"></i></span>
                            </div>
                            <div class="metric-value">{{ number_format($weeklyRevenue, 2) }} ج.م</div>
                        </article>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <article class="metric-card metric-warning">
                            <div class="metric-top">
                                <span class="metric-label">أرباح آخر شهر</span>
                                <span class="metric-icon"><i class="bi bi-calendar-month"></i></span>
                            </div>
                            <div class="metric-value">{{ number_format($monthlyRevenue, 2) }} ج.م</div>
                        </article>
                    </div>
                </section>

                <!-- Orders list -->
                <section class="panel mt-2">
                    <div class="panel-header d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h2 class="h5 mb-1 section-title">
                                <i class="bi bi-table"></i> Orders List
                            </h2>
                            <p class="text-muted mb-0">Manage and review all orders.</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0" id="ordersTable">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Order ID</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total (Product)</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ number_format($item->product->price, 2) }} ج.م</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="fw-bold text-success">
                                            {{ number_format($item->product->price * $item->quantity, 2) }} ج.م
                                        </td>
                                        <td><span class="badge bg-info">{{ $order->status }}</span></td>
                                        <td>{{ $order->created_at ? $order->created_at->diffForHumans() : 'غير متوفر' }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </main>
@endsection
