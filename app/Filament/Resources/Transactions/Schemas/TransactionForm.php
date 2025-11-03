<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Schemas\Schema;
use App\Models\Invoice;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Invoice Information
                Select::make('invoice_id')
                    ->label('Invoice Number')
                    ->options(Invoice::all()->pluck('invoice_number', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($set, $state) {
                        if ($state) {
                            $invoice = Invoice::find($state);
                            if ($invoice) {
                                // Auto-fill fields based on invoice data
                                $set('type', 'expense');
                                $set('category', 'invoice_payment');
                                $set('description', 'Payment for Invoice ' . $invoice->invoice_number);
                                $set('amount', (float) $invoice->balance);
                                $set('transaction_date', now()->format('Y-m-d'));
                                $set('reference_number', $invoice->invoice_number);
                                $set('vendor_customer', $invoice->vendor_name);
                                $set('notes', 'Auto-generated from Invoice #' . $invoice->invoice_number . 
                                             "\nTotal: Rp " . number_format((float) $invoice->total, 2, ',', '.') . 
                                             "\nPaid: Rp " . number_format((float) $invoice->paid_amount, 2, ',', '.') . 
                                             "\nBalance: Rp " . number_format((float) $invoice->balance, 2, ',', '.'));
                            }
                        }
                    })
                    ->helperText('💡 Select an invoice to automatically fill transaction details')
                    ->columnSpanFull(),
                
                // Transaction Details
                Select::make('type')
                    ->options(['income' => 'Income', 'expense' => 'Expense'])
                    ->default('expense')
                    ->required()
                    ->native(false),
                
                TextInput::make('category')
                    ->label('Category')
                    ->required()
                    ->placeholder('e.g., Office Supplies, Utilities, Sales'),
                
                TextInput::make('description')
                    ->required()
                    ->placeholder('Brief description of the transaction')
                    ->columnSpanFull(),
                
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->placeholder('0.00')
                    ->minValue(0)
                    ->step(0.01),
                
                DatePicker::make('transaction_date')
                    ->label('Transaction Date')
                    ->required()
                    ->default(now())
                    ->native(false),
                
                // Payment Information
                Select::make('payment_method')
                    ->options([
                        'cash' => 'Cash',
                        'bank_transfer' => 'Bank Transfer',
                        'credit_card' => 'Credit Card',
                        'check' => 'Check',
                    ])
                    ->default('bank_transfer')
                    ->required()
                    ->native(false),
                
                TextInput::make('vendor_customer')
                    ->label('Vendor/Customer')
                    ->placeholder('Name of vendor or customer'),
                
                TextInput::make('reference_number')
                    ->label('Reference Number')
                    ->placeholder('Invoice/Receipt number'),
                
                // Additional Information
                Textarea::make('notes')
                    ->placeholder('Additional notes or comments')
                    ->rows(3)
                    ->columnSpanFull(),
                
                FileUpload::make('attachment')
                    ->label('Attachment')
                    ->directory('transactions/attachments')
                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                    ->maxSize(5120)
                    ->helperText('Upload receipt, invoice, or supporting document (Max 5MB)')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
