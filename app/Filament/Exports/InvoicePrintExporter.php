<?php

namespace App\Filament\Exports;

use App\Models\Invoice;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class InvoicePrintExporter extends Exporter
{
    protected static ?string $model = Invoice::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('invoice_number')
                ->label('INVOICE NUMBER'),
            ExportColumn::make('invoice_date')
                ->label('INVOICE DATE'),
            ExportColumn::make('due_date')
                ->label('DUE DATE'),
            ExportColumn::make('status')
                ->label('STATUS')
                ->formatStateUsing(fn ($state) => strtoupper($state)),
            
            // Vendor Information
            ExportColumn::make('vendor_name')
                ->label('BILL TO - NAME'),
            ExportColumn::make('vendor_email')
                ->label('BILL TO - EMAIL'),
            ExportColumn::make('vendor_phone')
                ->label('BILL TO - PHONE'),
            ExportColumn::make('vendor_address')
                ->label('BILL TO - ADDRESS'),
            
            // PO Information
            ExportColumn::make('purchaseOrder.po_number')
                ->label('PO NUMBER'),
            
            // Financial Summary
            ExportColumn::make('subtotal')
                ->label('SUBTOTAL')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            ExportColumn::make('tax')
                ->label('TAX')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            ExportColumn::make('discount')
                ->label('DISCOUNT')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            ExportColumn::make('total')
                ->label('TOTAL AMOUNT')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            ExportColumn::make('paid_amount')
                ->label('PAID AMOUNT')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            ExportColumn::make('balance')
                ->label('BALANCE DUE')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
            
            // Items (akan diformat khusus)
            ExportColumn::make('items_list')
                ->label('ITEMS')
                ->state(function (Invoice $record): string {
                    $items = [];
                    foreach ($record->items as $item) {
                        $items[] = "{$item->product_name} | Qty: {$item->quantity} | @Rp " . number_format($item->unit_price, 2, ',', '.') . " | Total: Rp " . number_format($item->total, 2, ',', '.');
                    }
                    return implode("\n", $items);
                }),
            
            // Payment History
            ExportColumn::make('payments_list')
                ->label('PAYMENT HISTORY')
                ->state(function (Invoice $record): string {
                    $payments = [];
                    foreach ($record->payments as $payment) {
                        $payments[] = "{$payment->payment_number} | {$payment->payment_date} | Rp " . number_format($payment->amount, 2, ',', '.') . " | {$payment->payment_method}";
                    }
                    return $payments ? implode("\n", $payments) : 'No payments yet';
                }),
            
            ExportColumn::make('notes')
                ->label('NOTES'),
            ExportColumn::make('created_at')
                ->label('CREATED AT'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Invoice export completed! ' . Number::format($export->successful_rows) . ' ' . str('invoice')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
