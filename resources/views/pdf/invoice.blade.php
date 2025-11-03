<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
        }
        .invoice-title {
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }
        .info-section {
            margin: 20px 0;
        }
        .info-row {
            margin: 5px 0;
        }
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .bill-to {
            background: #f3f4f6;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th {
            background: #2563eb;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .text-right {
            text-align: right;
        }
        .summary {
            float: right;
            width: 300px;
            margin-top: 20px;
        }
        .summary-row {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
        .summary-label {
            display: inline-block;
            width: 150px;
        }
        .summary-value {
            float: right;
            font-weight: bold;
        }
        .total-row {
            background: #2563eb;
            color: white;
            padding: 10px;
            margin-top: 5px;
            font-size: 14px;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #666;
            clear: both;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-weight: bold;
            font-size: 10px;
        }
        .status-paid { background: #10b981; color: white; }
        .status-partial { background: #f59e0b; color: white; }
        .status-unpaid { background: #ef4444; color: white; }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">SMARTPLUS ID</div>
        <div>Smart Manufacturing & IoT Solutions</div>
    </div>

    <div class="invoice-title">
        INVOICE
        <span class="status-badge status-{{ $invoice->status }}">
            {{ strtoupper($invoice->status) }}
        </span>
    </div>

    <div class="info-section">
        <div class="info-row">
            <span class="info-label">Invoice Number:</span>
            <span>{{ $invoice->invoice_number }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Invoice Date:</span>
            <span>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Due Date:</span>
            <span>{{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</span>
        </div>
        @if($invoice->purchase_order_id)
        <div class="info-row">
            <span class="info-label">PO Reference:</span>
            <span>{{ $invoice->purchaseOrder->po_number }}</span>
        </div>
        @endif
    </div>

    <div class="bill-to">
        <strong>BILL TO:</strong><br>
        <strong>{{ $invoice->vendor_name }}</strong><br>
        @if($invoice->vendor_email)
        Email: {{ $invoice->vendor_email }}<br>
        @endif
        @if($invoice->vendor_phone)
        Phone: {{ $invoice->vendor_phone }}<br>
        @endif
        @if($invoice->vendor_address)
        {{ $invoice->vendor_address }}
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="40%">Product/Service</th>
                <th width="15%">Quantity</th>
                <th width="20%">Unit Price</th>
                <th width="20%" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <strong>{{ $item->product_name }}</strong><br>
                    @if($item->description)
                    <small>{{ $item->description }}</small>
                    @endif
                </td>
                <td>{{ $item->quantity }} {{ $item->unit }}</td>
                <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-row">
            <span class="summary-label">Subtotal:</span>
            <span class="summary-value">Rp {{ number_format($invoice->subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Tax:</span>
            <span class="summary-value">Rp {{ number_format($invoice->tax, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row">
            <span class="summary-label">Discount:</span>
            <span class="summary-value">Rp {{ number_format($invoice->discount, 0, ',', '.') }}</span>
        </div>
        <div class="total-row">
            <span class="summary-label">TOTAL:</span>
            <span class="summary-value">Rp {{ number_format($invoice->total, 0, ',', '.') }}</span>
        </div>
        <div class="summary-row" style="margin-top: 10px;">
            <span class="summary-label">Paid Amount:</span>
            <span class="summary-value" style="color: #10b981;">Rp {{ number_format($invoice->paid_amount, 0, ',', '.') }}</span>
        </div>
        <div class="total-row" style="background: #ef4444;">
            <span class="summary-label">BALANCE DUE:</span>
            <span class="summary-value">Rp {{ number_format($invoice->balance, 0, ',', '.') }}</span>
        </div>
    </div>

    @if($invoice->payments && $invoice->payments->count() > 0)
    <div style="clear: both; margin-top: 30px;">
        <strong>Payment History:</strong>
        <table>
            <thead>
                <tr>
                    <th>Payment Number</th>
                    <th>Date</th>
                    <th>Method</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->payments as $payment)
                <tr>
                    <td>{{ $payment->payment_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $payment->payment_method)) }}</td>
                    <td class="text-right">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if($invoice->notes)
    <div style="clear: both; margin-top: 20px;">
        <strong>Notes:</strong><br>
        <p>{{ $invoice->notes }}</p>
    </div>
    @endif

    <div class="footer">
        <p>Thank you for your business!</p>
        <p>This is a computer-generated invoice. For any questions, please contact us.</p>
    </div>
</body>
</html>
