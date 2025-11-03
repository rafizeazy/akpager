<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('invoice.invoice_number')
                    ->label('Invoice')
                    ->searchable()
                    ->sortable()
                    ->placeholder('—')
                    ->description(fn ($record) => $record->invoice ? 'Total: Rp ' . number_format($record->invoice->total, 0, ',', '.') : null),
                
                TextColumn::make('transaction_date')
                    ->label('Date')
                    ->date('d M Y')
                    ->sortable(),
                
                TextColumn::make('type')
                    ->badge()
                    ->colors([
                        'success' => 'income',
                        'danger' => 'expense',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                
                TextColumn::make('category')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                
                TextColumn::make('description')
                    ->searchable()
                    ->limit(40)
                    ->tooltip(fn ($record) => $record->description),
                
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('IDR')
                    ->sortable()
                    ->color(fn ($record) => $record->type === 'income' ? 'success' : 'danger')
                    ->weight('bold'),
                
                TextColumn::make('vendor_customer')
                    ->label('Vendor/Customer')
                    ->searchable()
                    ->toggleable(),
                
                TextColumn::make('payment_method')
                    ->label('Payment')
                    ->badge()
                    ->color('gray')
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                
                TextColumn::make('attachment')
                    ->label('Attachment')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn ($state) => $state ? '📎 Yes' : '—'),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('transaction_date', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
