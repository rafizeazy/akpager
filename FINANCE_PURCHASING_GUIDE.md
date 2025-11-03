# Finance & Purchasing Module - Complete Guide

## Overview

Sistem ini menyediakan modul lengkap untuk mengelola Finance (Keuangan) dan Purchasing (Pembelian) dengan workflow yang terintegrasi.

## Module Structure

### 1. Finance Module

-   **Transactions**: Mendata semua transaksi pemasukan dan pengeluaran

### 2. Purchasing Module

-   **Quotations**: Buat dan kelola quotation dari vendor
-   **Purchase Orders (PO)**: Convert quotation menjadi PO
-   **Invoices**: Generate invoice dari PO, track pembayaran

---

## Database Schema

### Finance Tables

#### `transactions`

-   Track pemasukan (income) dan pengeluaran (expense)
-   Fields: type, category, description, amount, transaction_date, vendor_customer, payment_method, reference_number, notes, attachment

### Purchasing Tables

#### `quotations`

-   Store vendor quotations
-   Fields: quotation_number (auto), vendor info, dates, status, pricing (subtotal, tax, discount, total)
-   Status: draft, sent, approved, rejected, converted

#### `quotation_items`

-   Line items untuk quotation
-   Fields: item_name, description, quantity, unit_price, total
-   Total auto-calculated: quantity × unit_price

#### `purchase_orders`

-   Purchase orders dari approved quotations
-   Fields: po_number (auto), quotation_id, vendor info, dates, status, pricing
-   Status: draft, ordered, partially_received, received, cancelled

#### `po_items`

-   Line items untuk PO
-   Fields: item_name, description, quantity, received_quantity, unit_price, total

#### `invoices`

-   Invoices generated dari PO
-   Fields: invoice_number (auto), purchase_order_id, vendor info, dates, status, pricing, paid_amount, balance
-   Status: unpaid, partial, paid, overdue, cancelled

#### `invoice_items`

-   Line items untuk invoice

#### `payments`

-   Track pembayaran untuk invoice (bisa bertahap)
-   Fields: payment_number (auto), invoice_id, payment_date, amount, payment_method, reference_number, receipt_file
-   Auto-update invoice status saat payment ditambah/dihapus

---

## Workflow Best Practice

### Complete Purchase Workflow

```
1. QUOTATION
   ↓
2. CONVERT TO PO (copy all items & prices)
   ↓
3. PO → Status: ORDERED → Receive Items → Status: RECEIVED
   ↓
4. GENERATE INVOICE (from PO)
   ↓
5. ADD PAYMENTS (bertahap jika perlu)
   ↓
6. Invoice Status: UNPAID → PARTIAL → PAID (auto-update)
```

### Step-by-Step Guide

#### Step 1: Create Quotation

1. Go to **Purchasing → Quotations**
2. Click **New**
3. Fill vendor information
4. Click **Save**
5. Add items via **Items** relation tab:
    - Item Name: "Printer HP LaserJet Pro"
    - Quantity: 2
    - Unit Price: 3500000
    - Total: Auto-calculated (7000000)
6. Set status to **Sent** or **Approved**

#### Step 2: Convert Quotation to PO

1. Open quotation
2. Click **Actions → Convert to PO** (coming soon)
3. OR manually:
    - Create new Purchase Order
    - Select quotation
    - Copy vendor info
    - Add same items from quotation

#### Step 3: Manage Purchase Order

1. Go to **Purchasing → Purchase Orders**
2. Open your PO
3. Update status:
    - **Draft** → **Ordered** (after order sent)
    - **Ordered** → **Received** (after goods received)
4. Track received quantities in Items tab

#### Step 4: Generate Invoice

1. From PO, click **Actions → Generate Invoice** (coming soon)
2. OR manually:
    - Create new Invoice
    - Select purchase_order
    - Copy items and amounts
3. Set due date

#### Step 5: Record Payments

1. Open Invoice
2. Go to **Payments** relation tab
3. Add payment:
    - Payment Date: today
    - Amount: bisa partial (e.g., 5000000 dari 7000000)
    - Payment Method: Bank Transfer
    - Reference: Transaction ID
    - Upload receipt file (optional)
4. Invoice status auto-update:
    - **Unpaid** (0 paid)
    - **Partial** (some paid, balance > 0)
    - **Paid** (fully paid)

#### Step 6: Finance Tracking

1. Go to **Finance → Transactions**
2. Record expense for this purchase:
    - Type: Expense
    - Category: Office Equipment
    - Description: "Printer HP LaserJet Pro x2"
    - Amount: 7000000
    - Transaction Date: payment date
    - Vendor: from invoice
    - Reference: invoice number
    - Attachment: receipt/invoice file

---

## Filament Features Implemented

### 1. **RelationManagers** (Inline Item Management)

Setiap resource yang punya items menggunakan RelationManager:

**Quotation → Items**

```php
// app/Filament/Resources/Quotations/RelationManagers/ItemsRelationManager.php
// Add/edit/delete items directly in quotation modal
```

**PurchaseOrder → Items**

```php
// app/Filament/Resources/PurchaseOrders/RelationManagers/ItemsRelationManager.php
// Track received quantities
```

**Invoice → Items & Payments**

```php
// app/Filament/Resources/Invoices/RelationManagers/ItemsRelationManager.php
// app/Filament/Resources/Invoices/RelationManagers/PaymentsRelationManager.php
// Manage invoice items and track payments
```

### 2. **Table Actions** (Custom Actions)

Coming soon features:

-   **Quotation**: "Convert to PO" button
-   **PurchaseOrder**: "Generate Invoice" button
-   **Invoice**: "Mark as Paid" button (set status paid immediately)

### 3. **Table Filters**

**Transactions**:

-   Filter by Type (income/expense)
-   Filter by Category
-   Filter by Payment Method
-   Date range filter

**Quotations/PO/Invoices**:

-   Status filters
-   Date range filters
-   Vendor filters

### 4. **Export Actions**

Coming soon with spatie/simple-excel:

-   Export transactions to Excel
-   Export invoices with payments
-   Export PO reports

---

## Model Relationships

### Transaction Model

```php
// Standalone, no relationships
protected $fillable = ['type', 'category', 'description', 'amount', ...];
```

### Quotation Model

```php
public function items(): HasMany
public function purchaseOrder(): BelongsTo
// Auto-generate quotation_number: QUO-2025-00001
```

### PurchaseOrder Model

```php
public function items(): HasMany
public function quotation(): BelongsTo
public function invoice(): HasOne
// Auto-generate po_number: PO-2025-00001
```

### Invoice Model

```php
public function items(): HasMany
public function payments(): HasMany
public function purchaseOrder(): BelongsTo
public function updatePaymentStatus(): void // Auto-update status
// Auto-generate invoice_number: INV-2025-00001
```

### Payment Model

```php
public function invoice(): BelongsTo
// Auto-generate payment_number: PAY-2025-00001
// Auto-update invoice status on save/delete
```

### Item Models (QuotationItem, POItem, InvoiceItem)

```php
protected static function boot()
{
    static::saving(function ($item) {
        $item->total = $item->quantity * $item->unit_price; // Auto-calculate
    });
}
```

---

## File Uploads

### Transaction Attachments

-   Disk: `public_assets`
-   Directory: `finance/attachments/`
-   Accepted: PDF, images
-   Purpose: Store receipts, invoices

### Payment Receipts

-   Disk: `public_assets`
-   Directory: `finance/receipts/`
-   Purpose: Store payment proof

Configuration in `config/filesystems.php`:

```php
'public_assets' => [
    'driver' => 'local',
    'root' => public_path('assets'),
    'url' => env('APP_URL').'/assets',
    'visibility' => 'public',
],
```

---

## Navigation Groups

### Finance

-   Icon: 🪙 (banknotes)
-   Resources:
    1. **Transactions** (sort: 1)

### Purchasing

-   Resources:
    1. **Quotations** - Icon: 📄 (document-text), sort: 1
    2. **Purchase Orders** - Icon: 🛒 (shopping-cart), sort: 2
    3. **Invoices** - Icon: 📋 (clipboard-document-check), sort: 3

---

## Auto-Calculations

### 1. Item Totals

```php
// QuotationItem, POItem, InvoiceItem
$item->total = $item->quantity * $item->unit_price;
```

### 2. Document Totals

```php
// Quotation, PurchaseOrder, Invoice
$subtotal = items->sum('total');
$total = $subtotal + $tax - $discount;
```

### 3. Invoice Payment Status

```php
// Automatic on Payment save/delete
$invoice->paid_amount = $invoice->payments()->sum('amount');
$invoice->balance = $invoice->total - $invoice->paid_amount;

if ($paid_amount >= $total) {
    $status = 'paid';
} elseif ($paid_amount > 0) {
    $status = 'partial';
} else {
    $status = 'unpaid';
}
```

---

## Forms Layout

### Transaction Form (2 columns)

```
[Type]           [Category]
[Date]           [Amount (Rp)]
[Description (full width)]
[Vendor/Customer]  [Reference Number]
[Payment Method]   [Attachment File]
[Notes (full width)]
```

### Quotation/PO/Invoice Form

```
[Number (auto)]     [Date]
[Vendor Name (full width)]
[Vendor Email]      [Vendor Phone]
[Vendor Address (full width)]
[Status]           [Valid Until / Due Date]
[Subtotal]  [Tax]  [Discount]
[Total (calculated)]
[Notes (full width)]
```

---

## Table Columns

### Transaction Table

-   transaction_date (sortable, searchable)
-   type (badge: green=income, red=expense)
-   category (sortable)
-   description (limit 40 chars)
-   amount (money IDR, with sum summarizer)
-   vendor_customer (toggleable hidden)
-   payment_method (badge)

### Quotation Table

-   quotation_number (searchable)
-   vendor_name (searchable)
-   quotation_date (sortable)
-   status (badge with colors)
-   total (money IDR)
-   valid_until (date)

### Purchase Order Table

-   po_number (searchable)
-   vendor_name (searchable)
-   po_date (sortable)
-   status (badge)
-   total (money IDR)
-   expected_delivery (date)

### Invoice Table

-   invoice_number (searchable)
-   vendor_name (searchable)
-   invoice_date (sortable)
-   due_date (date)
-   status (badge: red=unpaid, yellow=partial, green=paid)
-   total (money IDR)
-   paid_amount (money IDR)
-   balance (money IDR)

---

## Tips & Best Practices

### 1. Workflow Sequence

✅ **RECOMMENDED**: Quotation → PO → Invoice → Payments
❌ **AVOID**: Creating standalone invoices without PO

### 2. Status Management

-   Always update PO status when receiving goods
-   Let invoice status auto-update via payments
-   Use filters to track pending items

### 3. Item Management

-   Use RelationManagers for adding items (easier than modal)
-   Double-check calculations
-   Add descriptions for clarity

### 4. Finance Tracking

-   Record every payment as Transaction
-   Match reference numbers between systems
-   Attach receipts/invoices

### 5. Export & Reports

-   Use table filters before export
-   Export regularly for accounting
-   Keep backup of important documents

---

## Coming Soon Features

### Table Actions to Implement

#### 1. Convert Quotation to PO

```php
Tables\Actions\Action::make('convertToPO')
    ->label('Convert to PO')
    ->icon('heroicon-o-arrow-right-circle')
    ->visible(fn ($record) => $record->status === 'approved')
    ->action(function ($record) {
        $po = PurchaseOrder::create([
            'quotation_id' => $record->id,
            'vendor_name' => $record->vendor_name,
            // ... copy all fields
        ]);

        foreach ($record->items as $item) {
            $po->items()->create([
                'item_name' => $item->item_name,
                // ... copy all item fields
            ]);
        }

        $record->update(['status' => 'converted']);

        return redirect()->route('filament.admin.resources.purchase-orders.edit', $po);
    });
```

#### 2. Generate Invoice from PO

```php
Tables\Actions\Action::make('generateInvoice')
    ->label('Generate Invoice')
    ->icon('heroicon-o-document-plus')
    ->visible(fn ($record) => $record->status === 'received' && !$record->invoice)
    ->action(function ($record) {
        $invoice = Invoice::create([
            'purchase_order_id' => $record->id,
            // ... copy fields
        ]);

        foreach ($record->items as $item) {
            $invoice->items()->create([...]);
        }

        return redirect()->route('filament.admin.resources.invoices.edit', $invoice);
    });
```

#### 3. Mark Invoice as Paid

```php
Tables\Actions\Action::make('markAsPaid')
    ->label('Mark as Paid')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->visible(fn ($record) => $record->status !== 'paid')
    ->requiresConfirmation()
    ->action(function ($record) {
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
            ->title('Invoice marked as paid')
            ->send();
    });
```

### Export Configuration (spatie/simple-excel)

Install package:

```bash
composer require spatie/simple-excel
```

Create Exporter:

```bash
php artisan make:filament-exporter Transaction
```

---

## Troubleshooting

### Issue: Foreign key constraint errors

**Solution**: Migrations run in correct order:

1. transactions
2. quotations & quotation_items
3. purchase_orders & po_items
4. invoices & invoice_items
5. payments

### Issue: Invoice status not updating

**Solution**: Check Payment model boot() method includes:

```php
static::saved(function ($payment) {
    $payment->invoice->updatePaymentStatus();
});
```

### Issue: Totals not calculating

**Solution**: Check Item models have boot() with:

```php
static::saving(function ($item) {
    $item->total = $item->quantity * $item->unit_price;
});
```

---

## Quick Reference

### Auto-Generated Numbers

-   Quotation: `QUO-2025-00001`
-   PO: `PO-2025-00001`
-   Invoice: `INV-2025-00001`
-   Payment: `PAY-2025-00001`

### Status Values

**Quotation**: draft, sent, approved, rejected, converted
**PurchaseOrder**: draft, ordered, partially_received, received, cancelled  
**Invoice**: unpaid, partial, paid, overdue, cancelled

### Payment Methods

-   cash
-   bank_transfer
-   credit_card
-   check

---

## File Locations

### Models

-   `app/Models/Transaction.php`
-   `app/Models/Quotation.php`
-   `app/Models/QuotationItem.php`
-   `app/Models/PurchaseOrder.php`
-   `app/Models/POItem.php`
-   `app/Models/Invoice.php`
-   `app/Models/InvoiceItem.php`
-   `app/Models/Payment.php`

### Resources

-   `app/Filament/Resources/Transactions/TransactionResource.php`
-   `app/Filament/Resources/Quotations/QuotationResource.php`
-   `app/Filament/Resources/PurchaseOrders/PurchaseOrderResource.php`
-   `app/Filament/Resources/Invoices/InvoiceResource.php`

### RelationManagers

-   `app/Filament/Resources/Quotations/RelationManagers/ItemsRelationManager.php`
-   `app/Filament/Resources/PurchaseOrders/RelationManagers/ItemsRelationManager.php`
-   `app/Filament/Resources/Invoices/RelationManagers/ItemsRelationManager.php`
-   `app/Filament/Resources/Invoices/RelationManagers/PaymentsRelationManager.php`

### Migrations

-   `database/migrations/2025_10_29_184847_create_transactions_table.php`
-   `database/migrations/2025_10_29_184900_create_quotations_table.php`
-   `database/migrations/2025_10_29_184912_create_purchase_orders_table.php`
-   `database/migrations/2025_10_29_184914_create_invoices_table.php`
-   `database/migrations/2025_10_29_184915_create_payments_table.php`

---

## Support

For questions or issues, check:

1. This documentation
2. Filament documentation: https://filamentphp.com/docs
3. Laravel documentation: https://laravel.com/docs

Happy managing your Finance & Purchasing! 🚀
