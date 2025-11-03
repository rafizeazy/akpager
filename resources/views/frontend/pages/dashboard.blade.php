@extends('frontend.layouts.app')

@section('content')
<!--=========================== 
    Breadcrumb Area Start
===========================-->
<section class="breadcrumb-area bg-cover" style="background-image: url({{ asset('assets/images/backgrounds/breadcrumb-bg.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h1 class="breadcrumb-title wow animate__animated animate__fadeInUp">Finance Dashboard</h1>
                    <ul class="breadcrumb-list wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================== 
    Breadcrumb Area End
===========================-->

<!--=========================== 
    Dashboard Area Start
===========================-->
<section class="dashboard-area pt-120 pb-120">
    <div class="container">
        <!-- Filter Section -->
        <div class="row mb-40">
            <div class="col-12">
                <div class="filter-box" style="background: #f8f9fa; padding: 30px; border-radius: 10px;">
                    <form action="{{ url('/dashboard') }}" method="GET" id="filterForm">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="start_date" class="form-label fw-bold">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $startDate }}">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date" class="form-label fw-bold">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $endDate }}">
                            </div>
                            <div class="col-md-2">
                                <label for="type" class="form-label fw-bold">Type</label>
                                <select class="form-select" id="type" name="type">
                                    <option value="">All Types</option>
                                    <option value="income" {{ $type == 'income' ? 'selected' : '' }}>Income</option>
                                    <option value="expense" {{ $type == 'expense' ? 'selected' : '' }}>Expense</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="category" class="form-label fw-bold">Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat }}" {{ $category == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="payment_method" class="form-label fw-bold">Payment Method</label>
                                <select class="form-select" id="payment_method" name="payment_method">
                                    <option value="">All Methods</option>
                                    @foreach($paymentMethods as $method)
                                        <option value="{{ $method }}" {{ $paymentMethod == $method ? 'selected' : '' }}>{{ ucfirst($method) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-filter"></i> Apply Filter
                                </button>
                                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">
                                    <i class="fas fa-redo"></i> Reset
                                </a>
                                <a href="{{ url('/dashboard/export') }}?start_date={{ $startDate }}&end_date={{ $endDate }}" class="btn btn-success">
                                    <i class="fas fa-download"></i> Export CSV
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-40">
            <!-- Total Income -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; border-radius: 15px; color: white; box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0" style="opacity: 0.9;">Total Income</h6>
                            <p class="mb-0" style="opacity: 0.7; font-size: 12px;">{{ $incomeCount }} transactions</p>
                        </div>
                    </div>
                    <h2 class="mb-0 fw-bold">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h2>
                </div>
            </div>

            <!-- Total Expense -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 30px; border-radius: 15px; color: white; box-shadow: 0 10px 30px rgba(245, 87, 108, 0.3);">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0" style="opacity: 0.9;">Total Expense</h6>
                            <p class="mb-0" style="opacity: 0.7; font-size: 12px;">{{ $expenseCount }} transactions</p>
                        </div>
                    </div>
                    <h2 class="mb-0 fw-bold">Rp {{ number_format($totalExpense, 0, ',', '.') }}</h2>
                </div>
            </div>

            <!-- Net Profit/Loss -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card" style="background: linear-gradient(135deg, {{ $netProfit >= 0 ? '#4facfe 0%, #00f2fe' : '#fa709a 0%, #fee140' }} 100%); padding: 30px; border-radius: 15px; color: white; box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                            <i class="fas fa-{{ $netProfit >= 0 ? 'chart-line' : 'exclamation-triangle' }}"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0" style="opacity: 0.9;">Net {{ $netProfit >= 0 ? 'Profit' : 'Loss' }}</h6>
                            <p class="mb-0" style="opacity: 0.7; font-size: 12px;">Income - Expense</p>
                        </div>
                    </div>
                    <h2 class="mb-0 fw-bold">Rp {{ number_format(abs($netProfit), 0, ',', '.') }}</h2>
                </div>
            </div>

            <!-- Total Transactions -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-card" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); padding: 30px; border-radius: 15px; color: white; box-shadow: 0 10px 30px rgba(250, 112, 154, 0.3);">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon" style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0" style="opacity: 0.9;">Total Transactions</h6>
                            <p class="mb-0" style="opacity: 0.7; font-size: 12px;">All records</p>
                        </div>
                    </div>
                    <h2 class="mb-0 fw-bold">{{ $incomeCount + $expenseCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="row mb-40">
            <div class="col-lg-8 mb-4">
                <div class="chart-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <h4 class="mb-4">Income vs Expense Trend</h4>
                    <canvas id="transactionChart" height="100"></canvas>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="breakdown-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <h4 class="mb-4">Payment Methods</h4>
                    <div class="payment-methods">
                        @foreach($paymentMethodBreakdown as $payment)
                            <div class="payment-item mb-3 pb-3" style="border-bottom: 1px solid #eee;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ ucfirst($payment->payment_method) }}</h6>
                                        <small class="text-muted">{{ $payment->count }} transactions</small>
                                    </div>
                                    <div class="text-end">
                                        <strong>Rp {{ number_format($payment->total, 0, ',', '.') }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Breakdown -->
        <div class="row mb-40">
            <div class="col-12">
                <div class="category-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <h4 class="mb-4">Category Breakdown</h4>
                    <div class="row">
                        @foreach($categoryBreakdown as $cat)
                            <div class="col-md-3 mb-3">
                                <div class="category-item" style="background: {{ $cat->type == 'income' ? '#e8f5e9' : '#ffebee' }}; padding: 20px; border-radius: 10px;">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0">{{ ucfirst($cat->category) }}</h6>
                                        <span class="badge bg-{{ $cat->type == 'income' ? 'success' : 'danger' }}">
                                            {{ ucfirst($cat->type) }}
                                        </span>
                                    </div>
                                    <h5 class="mb-0 fw-bold" style="color: {{ $cat->type == 'income' ? '#2e7d32' : '#c62828' }}">
                                        Rp {{ number_format($cat->total, 0, ',', '.') }}
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction History Table -->
        <div class="row">
            <div class="col-12">
                <div class="table-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                    <h4 class="mb-4">Transaction History</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background: #f8f9fa;">
                                <tr>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Vendor/Customer</th>
                                    <th>Payment Method</th>
                                    <th class="text-end">Amount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $transaction->type == 'income' ? 'success' : 'danger' }}">
                                                <i class="fas fa-arrow-{{ $transaction->type == 'income' ? 'up' : 'down' }}"></i>
                                                {{ ucfirst($transaction->type) }}
                                            </span>
                                        </td>
                                        <td>{{ ucfirst($transaction->category) }}</td>
                                        <td>{{ \Str::limit($transaction->description, 40) }}</td>
                                        <td>{{ $transaction->vendor_customer ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ ucfirst($transaction->payment_method) }}</span>
                                        </td>
                                        <td class="text-end">
                                            <strong style="color: {{ $transaction->type == 'income' ? '#2e7d32' : '#c62828' }}">
                                                Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                                            </strong>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $transaction->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Detail Modal -->
                                    <div class="modal fade" id="detailModal{{ $transaction->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Transaction Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <th width="40%">Reference Number:</th>
                                                            <td>{{ $transaction->reference_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date:</th>
                                                            <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Type:</th>
                                                            <td>
                                                                <span class="badge bg-{{ $transaction->type == 'income' ? 'success' : 'danger' }}">
                                                                    {{ ucfirst($transaction->type) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Category:</th>
                                                            <td>{{ ucfirst($transaction->category) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Amount:</th>
                                                            <td><strong>Rp {{ number_format($transaction->amount, 0, ',', '.') }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Payment Method:</th>
                                                            <td>{{ ucfirst($transaction->payment_method) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Vendor/Customer:</th>
                                                            <td>{{ $transaction->vendor_customer ?? '-' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Description:</th>
                                                            <td>{{ $transaction->description }}</td>
                                                        </tr>
                                                        @if($transaction->notes)
                                                        <tr>
                                                            <th>Notes:</th>
                                                            <td>{{ $transaction->notes }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($transaction->attachment)
                                                        <tr>
                                                            <th>Attachment:</th>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $transaction->attachment) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-download"></i> Download
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5">
                                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                            <p class="text-muted">No transactions found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================== 
    Dashboard Area End
===========================-->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Transaction Chart
    const ctx = document.getElementById('transactionChart').getContext('2d');
    const transactionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartData['dates']) !!},
            datasets: [
                {
                    label: 'Income',
                    data: {!! json_encode($chartData['income']) !!},
                    borderColor: '#4caf50',
                    backgroundColor: 'rgba(76, 175, 80, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Expense',
                    data: {!! json_encode($chartData['expense']) !!},
                    borderColor: '#f44336',
                    backgroundColor: 'rgba(244, 67, 54, 0.1)',
                    tension: 0.4,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endpush

@endsection
