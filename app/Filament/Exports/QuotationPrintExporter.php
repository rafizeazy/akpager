<?php

namespace App\Filament\Exports;

use App\Models\Quotation;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class QuotationPrintExporter extends Exporter
{
    protected static ?string $model = Quotation::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('quotation_number')
                ->label('QUOTATION NUMBER'),
            ExportColumn::make('quotation_date')
                ->label('QUOTATION DATE'),
            ExportColumn::make('valid_until')
                ->label('VALID UNTIL'),
            ExportColumn::make('status')
                ->label('STATUS')
                ->formatStateUsing(fn ($state) => strtoupper($state)),
            
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
                ->state(function (Quotation $record): string {
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
            ExportColumn::make('created_at')
                ->label('CREATED AT'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Quotation export completed! ' . Number::format($export->successful_rows) . ' ' . str('quotation')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' failed.';
        }

        return $body;
    }
}
