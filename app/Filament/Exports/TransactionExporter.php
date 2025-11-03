<?php

namespace App\Filament\Exports;

use App\Models\Transaction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class TransactionExporter extends Exporter
{
    protected static ?string $model = Transaction::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('type')
                ->label('Type'),
            ExportColumn::make('category')
                ->label('Category'),
            ExportColumn::make('description')
                ->label('Description'),
            ExportColumn::make('amount')
                ->label('Amount')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ExportColumn::make('transaction_date')
                ->label('Transaction Date'),
            ExportColumn::make('reference_number')
                ->label('Reference Number'),
            ExportColumn::make('vendor_customer')
                ->label('Vendor/Customer'),
            ExportColumn::make('payment_method')
                ->label('Payment Method'),
            ExportColumn::make('notes')
                ->label('Notes'),
            ExportColumn::make('created_at')
                ->label('Created At'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your transaction export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
