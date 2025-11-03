<?php

namespace App\Filament\Resources\Invoices;

use App\Filament\Resources\Invoices\Pages\ManageInvoices;
use App\Models\Invoice;
use App\Models\Payment;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $recordTitleAttribute = 'invoice_number';

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-clipboard-document-check';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Purchasing';
    }

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('invoice_number')
                    ->default(fn () => 'INV-' . date('Y') . '-' . str_pad((\App\Models\Invoice::whereYear('created_at', date('Y'))->count() + 1), 5, '0', STR_PAD_LEFT))
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                Select::make('purchase_order_id')
                    ->relationship('purchaseOrder', 'po_number')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $po = \App\Models\PurchaseOrder::find($state);
                            if ($po) {
                                $set('vendor_name', $po->vendor_name);
                                $set('vendor_email', $po->vendor_email);
                                $set('vendor_phone', $po->vendor_phone);
                                $set('vendor_address', $po->vendor_address);
                                $set('subtotal', $po->subtotal);
                                $set('tax', $po->tax);
                                $set('discount', $po->discount);
                                $set('total', $po->total);
                                $set('due_date', now()->addDays(30));
                            }
                        }
                    })
                    ->default(null),
                TextInput::make('vendor_name')
                    ->required(),
                TextInput::make('vendor_email')
                    ->email()
                    ->default(null),
                TextInput::make('vendor_phone')
                    ->tel()
                    ->default(null),
                Textarea::make('vendor_address')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('invoice_date')
                    ->required(),
                DatePicker::make('due_date'),
                Select::make('status')
                    ->options([
            'unpaid' => 'Unpaid',
            'partial' => 'Partial',
            'paid' => 'Paid',
            'overdue' => 'Overdue',
            'cancelled' => 'Cancelled',
        ])
                    ->default('unpaid')
                    ->required(),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('tax')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->disabled()
                    ->dehydrated()
                    ->default(0),
                TextInput::make('paid_amount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('balance')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('invoice_number')
            ->columns([
                TextColumn::make('invoice_number')
                    ->searchable(),
                TextColumn::make('purchaseOrder.id')
                    ->searchable(),
                TextColumn::make('vendor_name')
                    ->searchable(),
                TextColumn::make('vendor_email')
                    ->searchable(),
                TextColumn::make('vendor_phone')
                    ->searchable(),
                TextColumn::make('invoice_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('due_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('subtotal')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tax')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('paid_amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('balance')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(\App\Filament\Exports\InvoiceExporter::class)
                    ->label('Export Excel'),
            ])
            ->recordActions([
                Action::make('printPdf')
                    ->label('Print PDF')
                    ->icon('heroicon-o-printer')
                    ->color('info')
                    ->action(function (Invoice $record) {
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.invoice', ['invoice' => $record]);
                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, "invoice-{$record->invoice_number}.pdf");
                    }),
                Action::make('markAsPaid')
                    ->label('Mark as Paid')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (Invoice $record) => $record->status !== 'paid' && $record->balance > 0)
                    ->requiresConfirmation()
                    ->modalHeading('Mark Invoice as Paid')
                    ->modalDescription(fn (Invoice $record) => "This will create a payment of Rp " . number_format($record->balance, 0, ',', '.') . " to fully pay this invoice.")
                    ->action(function (Invoice $record) {
                        $remainingBalance = $record->balance;
                        
                        Payment::create([
                            'invoice_id' => $record->id,
                            'payment_date' => now(),
                            'amount' => $remainingBalance,
                            'payment_method' => 'bank_transfer',
                            'notes' => 'Marked as paid via quick action',
                        ]);

                        Notification::make()
                            ->success()
                            ->title('Invoice Marked as Paid')
                            ->body("Invoice {$record->invoice_number} has been fully paid with amount Rp " . number_format($remainingBalance, 0, ',', '.'))
                            ->send();
                    }),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\Invoices\RelationManagers\ItemsRelationManager::class,
            \App\Filament\Resources\Invoices\RelationManagers\PaymentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageInvoices::route('/'),
        ];
    }
}
