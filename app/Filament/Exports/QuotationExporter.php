<?php

namespace App\Filament\Exports;

use App\Models\Quotation;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class QuotationExporter extends Exporter
{
    protected static ?string $model = Quotation::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('quotation_number')
                ->label('Quotation Number'),
            ExportColumn::make('vendor_name')
                ->label('Vendor Name'),
            ExportColumn::make('vendor_email')
                ->label('Vendor Email'),
            ExportColumn::make('vendor_phone')
                ->label('Vendor Phone'),
            ExportColumn::make('vendor_address')
                ->label('Vendor Address'),
            ExportColumn::make('quotation_date')
                ->label('Quotation Date'),
            ExportColumn::make('valid_until')
                ->label('Valid Until'),
            ExportColumn::make('status')
                ->label('Status'),
            ExportColumn::make('subtotal')
                ->label('Subtotal')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ExportColumn::make('tax')
                ->label('Tax')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ExportColumn::make('discount')
                ->label('Discount')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ExportColumn::make('total')
                ->label('Total')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ExportColumn::make('notes')
                ->label('Notes'),
            ExportColumn::make('created_at')
                ->label('Created At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your quotation export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
