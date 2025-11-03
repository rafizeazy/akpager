<?php

namespace App\Filament\Resources\PurchaseOrders;

use App\Filament\Resources\PurchaseOrders\Pages\ManagePurchaseOrders;
use App\Models\PurchaseOrder;
use App\Models\Invoice;
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

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $recordTitleAttribute = 'po_number';

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-shopping-cart';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Purchasing';
    }

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('po_number')
                    ->default(fn () => 'PO-' . date('Y') . '-' . str_pad((\App\Models\PurchaseOrder::whereYear('created_at', date('Y'))->count() + 1), 5, '0', STR_PAD_LEFT))
                    ->disabled()
                    ->dehydrated()
                    ->required(),
                Select::make('quotation_id')
                    ->relationship('quotation', 'quotation_number')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $quotation = \App\Models\Quotation::find($state);
                            if ($quotation) {
                                $set('vendor_name', $quotation->vendor_name);
                                $set('vendor_email', $quotation->vendor_email);
                                $set('vendor_phone', $quotation->vendor_phone);
                                $set('vendor_address', $quotation->vendor_address);
                                $set('subtotal', $quotation->subtotal);
                                $set('tax', $quotation->tax);
                                $set('discount', $quotation->discount);
                                $set('total', $quotation->total);
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
                DatePicker::make('po_date')
                    ->required(),
                DatePicker::make('expected_delivery'),
                Select::make('status')
                    ->options([
            'draft' => 'Draft',
            'ordered' => 'Ordered',
            'partially_received' => 'Partially received',
            'received' => 'Received',
            'cancelled' => 'Cancelled',
        ])
                    ->default('draft')
                    ->required(),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('tax')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->disabled()
                    ->dehydrated()
                    ->default(0.0),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('terms_conditions')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('po_number')
            ->columns([
                TextColumn::make('po_number')
                    ->searchable(),
                TextColumn::make('quotation.id')
                    ->searchable(),
                TextColumn::make('vendor_name')
                    ->searchable(),
                TextColumn::make('vendor_email')
                    ->searchable(),
                TextColumn::make('vendor_phone')
                    ->searchable(),
                TextColumn::make('po_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('expected_delivery')
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
                    ->exporter(\App\Filament\Exports\PurchaseOrderExporter::class)
                    ->label('Export Excel'),
            ])
            ->recordActions([
                Action::make('printPdf')
                    ->label('Print PDF')
                    ->icon('heroicon-o-printer')
                    ->color('info')
                    ->action(function (PurchaseOrder $record) {
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.purchase-order', ['po' => $record]);
                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, "po-{$record->po_number}.pdf");
                    }),
                Action::make('generateInvoice')
                    ->label('Generate Invoice')
                    ->icon('heroicon-o-document-plus')
                    ->color('success')
                    ->visible(fn (PurchaseOrder $record) => in_array($record->status, ['ordered', 'received']) && !$record->invoice)
                    ->requiresConfirmation()
                    ->action(function (PurchaseOrder $record) {
                        // Create Invoice
                        $invoice = Invoice::create([
                            'purchase_order_id' => $record->id,
                            'vendor_name' => $record->vendor_name,
                            'vendor_email' => $record->vendor_email,
                            'vendor_phone' => $record->vendor_phone,
                            'vendor_address' => $record->vendor_address,
                            'invoice_date' => now(),
                            'due_date' => now()->addDays(30),
                            'status' => 'unpaid',
                            'subtotal' => $record->subtotal,
                            'tax' => $record->tax,
                            'discount' => $record->discount,
                            'total' => $record->total,
                            'notes' => 'Generated from ' . $record->po_number,
                        ]);

                        // Copy items
                        foreach ($record->items as $item) {
                            $invoice->items()->create([
                                'item_name' => $item->item_name,
                                'description' => $item->description,
                                'quantity' => $item->quantity,
                                'unit_price' => $item->unit_price,
                                'total' => $item->total,
                            ]);
                        }

                        Notification::make()
                            ->success()
                            ->title('Invoice Created')
                            ->body("Invoice {$invoice->invoice_number} has been created from PO {$record->po_number}")
                            ->send();

                        return redirect()->route('filament.admin.resources.invoices.index');
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
            \App\Filament\Resources\PurchaseOrders\RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePurchaseOrders::route('/'),
        ];
    }
}
