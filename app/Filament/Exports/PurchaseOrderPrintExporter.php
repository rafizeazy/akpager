<?php

namespace App\Filament\Exports;

use App\Models\PurchaseOrder;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class PurchaseOrderPrintExporter extends Exporter
{
    protected static ?string $model = PurchaseOrder::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('po_number')
                ->label('PO NUMBER'),
            ExportColumn::make('po_date')
                ->label('PO DATE'),
            ExportColumn::make('expected_delivery')
                ->label('EXPECTED DELIVERY'),
            ExportColumn::make('status')
                ->label('STATUS')
                ->formatStateUsing(fn ($state) => strtoupper($state)),
            
            // Reference
            ExportColumn::make('quotation.quotation_number')
                ->label('QUOTATION REF'),
            
            // Vendor Information
            ExportColumn::make('vendor_name')
                ->label('VENDOR NAME'),
            ExportColumn::make('vendor_email')
                ->label('VENDOR EMAIL'),
            ExportColumn::make('vendor_phone')
                ->label('VENDOR PHONE'),
            ExportColumn::make('vendor_address')
                ->label('VENDOR ADDRESS'),
            
            // Items List
            ExportColumn::make('items_list')
                ->label('ITEMS')
                ->state(function (PurchaseOrder $record): string {
                    $items = [];
                    foreach ($record->items as $item) {
                        $items[] = "{$item->product_name} | Qty: {$item->quantity} {$item->unit} | @Rp " . number_format($item->unit_price, 2, ',', '.') . " | Total: Rp " . number_format($item->total, 2, ',', '.');
                    }
                    return implode("\n", $items);
                }),
            
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
            
            ExportColumn::make('notes')
                ->label('NOTES'),
            ExportColumn::make('terms_conditions')
                ->label('TERMS & CONDITIONS'),
            ExportColumn::make('created_at')
                ->label('CREATED AT'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Purchase Order export completed! ' . Number::format($export->successful_rows) . ' ' . str('PO')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' failed.';
        }

        return $body;
    }
}
