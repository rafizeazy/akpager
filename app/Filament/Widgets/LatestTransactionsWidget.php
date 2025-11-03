<?php

namespace App\Filament\Widgets;

use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Transaction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\Carbon;

class LatestTransactionsWidget extends TableWidget
{
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $heading = 'Latest Transactions';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Transaction::query()
                    ->latest('transaction_date')
                    ->latest('id')
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('transaction_date')
                    ->label('Date')
                    ->date('d M Y')
                    ->sortable()
                    ->searchable(),
                    
                BadgeColumn::make('type')
                    ->label('Type')
                    ->colors([
                        'success' => 'income',
                        'danger' => 'expense',
                    ])
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                    
                TextColumn::make('category')
                    ->label('Category')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state))),
                    
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->description),
                    
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('IDR')
                    ->sortable()
                    ->color(fn ($record) => $record->type === 'income' ? 'success' : 'danger')
                    ->weight('bold'),
                    
                TextColumn::make('payment_method')
                    ->label('Payment')
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state)))
                    ->badge()
                    ->color('gray'),
                    
                TextColumn::make('vendor_customer')
                    ->label('Vendor/Customer')
                    ->searchable()
                    ->limit(20)
                    ->toggleable(),
                    
                TextColumn::make('reference_number')
                    ->label('Reference')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                    ]),
                    
                SelectFilter::make('payment_method')
                    ->label('Payment Method')
                    ->options([
                        'cash' => 'Cash',
                        'bank_transfer' => 'Bank Transfer',
                        'credit_card' => 'Credit Card',
                        'check' => 'Check',
                    ]),
                    
                SelectFilter::make('category')
                    ->label('Category')
                    ->options([
                        'sales' => 'Sales',
                        'office_supplies' => 'Office Supplies',
                        'utilities' => 'Utilities',
                        'salary' => 'Salary',
                        'marketing' => 'Marketing',
                        'rent' => 'Rent',
                        'services' => 'Services',
                        'materials' => 'Materials',
                        'consulting' => 'Consulting',
                        'other' => 'Other',
                    ]),
                    
                Filter::make('transaction_date')
                    ->form([
                        DatePicker::make('date_from')
                            ->label('From Date'),
                        DatePicker::make('date_until')
                            ->label('Until Date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['date_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('transaction_date', '>=', $date),
                            )
                            ->when(
                                $data['date_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('transaction_date', '<=', $date),
                            );
                    }),
            ])
            ->defaultSort('transaction_date', 'desc')
            ->striped()
            ->paginated([10, 25, 50]);
    }
}
