<?php

namespace App\Filament\Resources\Quotations;

use App\Filament\Resources\Quotations\Pages\ManageQuotations;
use App\Models\Quotation;
use App\Models\PurchaseOrder;
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

class QuotationResource extends Resource
{
    protected static ?string $model = Quotation::class;

    protected static ?string $recordTitleAttribute = 'quotation_number';

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Purchasing';
    }

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('quotation_number')
                    ->default(fn () => 'Q/SPI/X/' . date('Y') . str_pad((\App\Models\Quotation::whereYear('created_at', date('Y'))->count() + 1), 5, '0', STR_PAD_LEFT))
                    ->disabled()
                    ->dehydrated()
                    ->required(),
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
                DatePicker::make('quotation_date')
                    ->required(),
                DatePicker::make('valid_until'),
                Select::make('status')
                    ->options([
            'draft' => 'Draft',
            'sent' => 'Sent',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'converted' => 'Converted',
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('quotation_number')
            ->columns([
                TextColumn::make('quotation_number')
                    ->searchable(),
                TextColumn::make('vendor_name')
                    ->searchable(),
                TextColumn::make('vendor_email')
                    ->searchable(),
                TextColumn::make('vendor_phone')
                    ->searchable(),
                TextColumn::make('quotation_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('valid_until')
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
                    ->exporter(\App\Filament\Exports\QuotationExporter::class)
                    ->label('Export Excel'),
            ])
            ->recordActions([
                Action::make('printPdf')
                    ->label('Print PDF')
                    ->icon('heroicon-o-printer')
                    ->color('info')
                    ->action(function (Quotation $record) {
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.quotation', ['quotation' => $record]);
                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, "quotation-{$record->quotation_number}.pdf");
                    }),
                Action::make('convertToPO')
                    ->label('Convert to PO')
                    ->icon('heroicon-o-arrow-right-circle')
                    ->color('success')
                    ->visible(fn (Quotation $record) => $record->status === 'approved')
                    ->requiresConfirmation()
                    ->action(function (Quotation $record) {
                        // Create PO
                        $po = PurchaseOrder::create([
                            'quotation_id' => $record->id,
                            'vendor_name' => $record->vendor_name,
                            'vendor_email' => $record->vendor_email,
                            'vendor_phone' => $record->vendor_phone,
                            'vendor_address' => $record->vendor_address,
                            'po_date' => now(),
                            'status' => 'draft',
                            'subtotal' => $record->subtotal,
                            'tax' => $record->tax,
                            'discount' => $record->discount,
                            'total' => $record->total,
                            'notes' => 'Converted from ' . $record->quotation_number,
                        ]);

                        // Copy items
                        foreach ($record->items as $item) {
                            $po->items()->create([
                                'item_name' => $item->item_name,
                                'description' => $item->description,
                                'quantity' => $item->quantity,
                                'unit_price' => $item->unit_price,
                                'total' => $item->total,
                            ]);
                        }

                        // Update quotation status
                        $record->update(['status' => 'converted']);

                        Notification::make()
                            ->success()
                            ->title('Purchase Order Created')
                            ->body("PO {$po->po_number} has been created from quotation {$record->quotation_number}")
                            ->send();

                        return redirect()->route('filament.admin.resources.purchase-orders.index');
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
            \App\Filament\Resources\Quotations\RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageQuotations::route('/'),
        ];
    }
}
