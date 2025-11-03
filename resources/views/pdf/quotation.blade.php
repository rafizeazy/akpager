<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quotation {{ $quotation->quotation_number }}</title>
    <style>
        body { font-family: 'Arial', sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #333; padding-bottom: 10px; }
        .company-name { font-size: 24px; font-weight: bold; color: #2563eb; }
        .doc-title { font-size: 20px; font-weight: bold; margin: 20px 0; }
        .info-section { margin: 20px 0; }
        .info-row { margin: 5px 0; }
        .info-label { font-weight: bold; display: inline-block; width: 150px; }
        .vendor-box { background: #f3f4f6; padding: 15px; border-radius: 5px; margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { background: #2563eb; color: white; padding: 10px; text-align: left; }
        td { padding: 8px; border-bottom: 1px solid #ddd; }
        .text-right { text-align: right; }
        .summary { float: right; width: 300px; margin-top: 20px; }
        .summary-row { padding: 5px 0; border-bottom: 1px solid #ddd; }
        .summary-label { display: inline-block; width: 150px; }
        .summary-value { float: right; font-weight: bold; }
        .total-row { background: #2563eb; color: white; padding: 10px; margin-top: 5px; font-size: 14px; font-weight: bold; }
        .footer { margin-top: 50px; text-align: center; font-size: 10px; color: #666; clear: both; }
        .status-badge { display: inline-block; padding: 5px 10px; border-radius: 3px; font-weight: bold; font-size: 10px; }
        .status-approved { background: #10b981; color: white; }
        .status-sent { background: #3b82f6; color: white; }
        .status-draft { background: #6b7280; color: white; }
        .status-rejected { background: #ef4444; color: white; }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-name">SMARTPLUS ID</div>
        <div>Smart Manufacturing & IoT Solutions</div>
    </div>

    <div class="doc-title">
        QUOTATION
        <span class="status-badge status-{{ $quotation->status }}">{{ strtoupper($quotation->status) }}</span>
    </div>

    <div class="info-section">
        <div class="info-row"><span class="info-label">Quotation Number:</span><span>{{ $quotation->quotation_number }}</span></div>
        <div class="info-row"><span class="info-label">Date:</span><span>{{ \Carbon\Carbon::parse($quotation->quotation_date)->format('d M Y') }}</span></div>
        @if($quotation->valid_until)
        <div class="info-row"><span class="info-label">Valid Until:</span><span>{{ \Carbon\Carbon::parse($quotation->valid_until)->format('d M Y') }}</span></div>
        @endif
    </div>

    <div class="vendor-box">
        <strong>VENDOR:</strong><br>
        <strong>{{ $quotation->vendor_name }}</strong><br>
        @if($quotation->vendor_email)Email: {{ $quotation->vendor_email }}<br>@endif
        @if($quotation->vendor_phone)Phone: {{ $quotation->vendor_phone }}<br>@endif
        @if($quotation->vendor_address){{ $quotation->vendor_address }}@endif
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">#</th>
                <th width="35%">Product/Service</th>
                <th width="15%">Quantity</th>
                <th width="20%">Unit Price</th>
                <th width="25%" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quotation->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $item->product_name }}</strong>@if($item->description)<br><small>{{ $item->description }}</small>@endif</td>
                <td>{{ $item->quantity }} {{ $item->unit }}</td>
                <td>Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <div class="summary-row"><span class="summary-label">Subtotal:</span><span class="summary-value">Rp {{ number_format($quotation->subtotal, 0, ',', '.') }}</span></div>
        <div class="summary-row"><span class="summary-label">Tax:</span><span class="summary-value">Rp {{ number_format($quotation->tax, 0, ',', '.') }}</span></div>
        <div class="summary-row"><span class="summary-label">Discount:</span><span class="summary-value">Rp {{ number_format($quotation->discount, 0, ',', '.') }}</span></div>
        <div class="total-row"><span class="summary-label">TOTAL:</span><span class="summary-value">Rp {{ number_format($quotation->total, 0, ',', '.') }}</span></div>
    </div>

    @if($quotation->notes)
    <div style="clear: both; margin-top: 20px;"><strong>Notes:</strong><br><p>{{ $quotation->notes }}</p></div>
    @endif

    <div class="footer">
        <p>Thank you for considering our quotation!</p>
        <p>This quotation is valid until {{ \Carbon\Carbon::parse($quotation->valid_until)->format('d M Y') }}</p>
    </div>
</body>
</html>
