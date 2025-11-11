# Transaction Auto-Fill dari Invoice

## Overview

Fitur ini memungkinkan Anda untuk membuat transaksi secara otomatis berdasarkan nomor invoice yang ada di sistem. Ketika Anda memilih invoice, form transaksi akan otomatis terisi dengan data dari invoice tersebut.

## Cara Menggunakan

### 1. Akses Menu Transaction

-   Login ke Filament Admin Panel: `http://localhost/admin`
-   Klik menu **Transactions** di sidebar
-   Klik tombol **New Transaction** atau **Create**

### 2. Pilih Invoice (Opsional)

Di bagian atas form, Anda akan melihat section **"Invoice Information"**:

-   Klik dropdown **"Invoice Number"**
-   Ketik untuk mencari invoice (searchable)
-   Pilih invoice yang ingin dijadikan transaksi

### 3. Auto-Fill Otomatis

Setelah memilih invoice, field berikut akan **otomatis terisi**:

| Field                | Auto-Fill Value                           |
| -------------------- | ----------------------------------------- |
| **Type**             | Expense (karena invoice = pengeluaran)    |
| **Category**         | invoice_payment                           |
| **Description**      | "Payment for Invoice INV-2025-00001"      |
| **Amount**           | Balance invoice (sisa yang belum dibayar) |
| **Transaction Date** | Tanggal hari ini                          |
| **Reference Number** | Nomor invoice                             |
| **Vendor/Customer**  | Nama vendor dari invoice                  |
| **Notes**            | Detail invoice (Total, Paid, Balance)     |

### 4. Edit & Simpan

-   Review data yang sudah terisi
-   Edit jika perlu (semua field masih bisa diubah)
-   Pilih **Payment Method** (Cash, Bank Transfer, Credit Card, Check)
-   Upload attachment jika ada (receipt/bukti transfer)
-   Klik **Create** atau **Save**

## Struktur Form

### Section 1: Invoice Information (Collapsible)

```
┌─────────────────────────────────────────────┐
│ Invoice Information                          │
│ Select an invoice to auto-fill...           │
├─────────────────────────────────────────────┤
│ Invoice Number: [Dropdown - Searchable]     │
│ Helper: Select an invoice to automatically  │
│         fill transaction details             │
└─────────────────────────────────────────────┘
```

### Section 2: Transaction Details

```
┌─────────────────────────────────────────────┐
│ Transaction Details                          │
├─────────────────────────────────────────────┤
│ Type:        [Dropdown] Income/Expense      │
│ Category:    [Text Input]                   │
│ Description: [Text Input - Full Width]      │
│ Amount:      [Number] Rp 0.00               │
│ Date:        [Date Picker]                  │
└─────────────────────────────────────────────┘
```

### Section 3: Payment Information

```
┌─────────────────────────────────────────────┐
│ Payment Information                          │
├─────────────────────────────────────────────┤
│ Payment Method:    [Dropdown]               │
│ Vendor/Customer:   [Text Input]             │
│ Reference Number:  [Text Input]             │
└─────────────────────────────────────────────┘
```

### Section 4: Additional Information (Collapsible)

```
┌─────────────────────────────────────────────┐
│ Additional Information                       │
├─────────────────────────────────────────────┤
│ Notes:      [Textarea]                      │
│ Attachment: [File Upload] Max 5MB          │
│             PDF or Image                    │
└─────────────────────────────────────────────┘
```

## Database Schema

### Relasi Baru

```php
// Transaction Model
public function invoice(): BelongsTo
{
    return $this->belongsTo(Invoice::class);
}

// Transactions Table
'invoice_id' => foreignId()->nullable()->constrained('invoices')
```

### Field Transaction

-   `id`: Primary Key
-   `invoice_id`: Foreign Key (nullable) → invoices.id
-   `type`: enum('income', 'expense')
-   `category`: string
-   `description`: string
-   `amount`: decimal(15,2)
-   `transaction_date`: date
-   `reference_number`: string (nullable)
-   `vendor_customer`: string (nullable)
-   `payment_method`: enum('cash', 'bank_transfer', 'credit_card', 'check')
-   `notes`: text (nullable)
-   `attachment`: string (nullable)

## Fitur Form

### Auto-Fill Logic

Ketika invoice dipilih, sistem akan:

1. Query invoice berdasarkan ID
2. Extract data invoice
3. Set nilai ke form fields menggunakan Livewire's `$set` function
4. Format angka dengan format Indonesia (Rp x.xxx,xx)

### Live Updates

-   Form menggunakan `->live()` pada invoice selector
-   Perubahan langsung terlihat tanpa refresh
-   User tetap bisa edit manual setelah auto-fill

### Validation

-   Type: required
-   Category: required
-   Description: required
-   Amount: required, numeric, min 0
-   Transaction Date: required
-   Payment Method: required

### File Upload

-   Location: `storage/app/transactions/attachments/`
-   Allowed: PDF, Images (jpg, png, gif, etc.)
-   Max Size: 5MB
-   Public accessible via storage link

## Use Cases

### 1. Bayar Invoice Penuh

```
Invoice Balance: Rp 10.000.000
→ Auto-fill amount: 10.000.000
→ Pilih payment method
→ Upload bukti transfer
→ Save
```

### 2. Bayar Invoice Sebagian

```
Invoice Balance: Rp 10.000.000
→ Auto-fill amount: 10.000.000
→ Edit amount: 5.000.000 (bayar sebagian)
→ Pilih payment method
→ Save
```

### 3. Transaksi Tanpa Invoice

```
→ Lewati Invoice Information section
→ Isi manual semua fields
→ Save
```

## Integrasi dengan Invoice

### Tidak Auto-Update Invoice

⚠️ **PENTING**: Membuat transaction TIDAK otomatis update invoice status!

Untuk update invoice payment:

1. Buka menu **Invoices**
2. Pilih invoice yang sudah dibayar
3. Klik **Add Payment**
4. Atau manual update status invoice

### Future Enhancement

Bisa ditambahkan:

-   Auto-update invoice paid_amount setelah create transaction
-   Auto-change invoice status (unpaid → partial → paid)
-   Validation: amount tidak boleh > balance
-   Link transaction ke payment (jika ada payment model)

## Technical Details

### Files Modified

1. **Migration**: `2025_11_02_143705_add_invoice_id_to_transactions_table.php`

    - Menambah kolom `invoice_id` (foreign key)

2. **Model**: `app/Models/Transaction.php`

    - Menambah `invoice_id` ke fillable
    - Menambah relasi `invoice()`

3. **Form**: `app/Filament/Resources/Transactions/Schemas/TransactionForm.php`
    - Restructure dengan Sections
    - Menambah Invoice selector dengan auto-fill
    - Live updates using Livewire
    - Better UX dengan helper texts

### Livewire Integration

```php
Select::make('invoice_id')
    ->live()  // Enable reactive updates
    ->afterStateUpdated(function ($set, $state) {
        // $set: Function untuk set nilai field lain
        // $state: Nilai invoice_id yang dipilih
        $invoice = Invoice::find($state);
        $set('amount', $invoice->balance);
        // ... dst
    })
```

## Testing

### Manual Test

1. Pastikan ada invoice di database:

    ```sql
    SELECT * FROM invoices WHERE balance > 0;
    ```

2. Buka form transaction
3. Pilih invoice dari dropdown
4. Verify auto-fill bekerja:

    - Amount = invoice balance
    - Vendor = invoice vendor_name
    - Reference = invoice number
    - Notes berisi detail invoice

5. Save dan check database:
    ```sql
    SELECT * FROM transactions WHERE invoice_id IS NOT NULL;
    ```

### Edge Cases

-   ✅ Invoice dengan balance = 0 (masih bisa dipilih)
-   ✅ Invoice NULL (transaksi manual)
-   ✅ Edit setelah auto-fill (allowed)
-   ✅ Multiple transaction untuk 1 invoice (allowed)

## Troubleshooting

### Dropdown Invoice Kosong

```bash
# Check apakah ada invoice
php artisan tinker
>>> App\Models\Invoice::count()

# Jika 0, seed invoice dulu
php artisan db:seed --class=InvoiceSeeder
```

### Auto-fill Tidak Bekerja

```bash
# Clear cache
php artisan optimize:clear

# Check Livewire
php artisan livewire:list
```

### Error Save Transaction

```bash
# Check migration
php artisan migrate:status

# Re-run migration jika perlu
php artisan migrate:fresh --seed
```

### File Upload Error

```bash
# Create storage link
php artisan storage:link

# Check permission
# Windows: tidak perlu
# Linux: chmod -R 775 storage
```

## Best Practices

### 1. Naming Convention

-   Category untuk invoice: `invoice_payment`
-   Reference: gunakan invoice number
-   Description: jelas dan informatif

### 2. Amount

-   Gunakan balance (sisa belum bayar), bukan total
-   Allow edit untuk partial payment
-   Validate tidak negatif

### 3. Attachment

-   Selalu upload bukti transfer
-   Gunakan format PDF untuk official documents
-   Compress image sebelum upload (max 5MB)

### 4. Notes

-   Auto-generated notes sudah include detail invoice
-   Tambahkan info tambahan jika perlu
-   Format: clear & readable

## Next Steps (Optional)

### Enhancement Ideas

1. **Auto-Update Invoice**

    ```php
    // After transaction created
    if ($transaction->invoice_id) {
        $invoice = $transaction->invoice;
        $invoice->paid_amount += $transaction->amount;
        $invoice->updatePaymentStatus();
    }
    ```

2. **Validation Amount**

    ```php
    TextInput::make('amount')
        ->rules([
            fn ($get) => function ($attribute, $value, $fail) use ($get) {
                $invoiceId = $get('invoice_id');
                if ($invoiceId) {
                    $invoice = Invoice::find($invoiceId);
                    if ($value > $invoice->balance) {
                        $fail('Amount exceeds invoice balance');
                    }
                }
            }
        ])
    ```

3. **Bulk Payment**

    - Select multiple invoices
    - Create one transaction untuk semua
    - Split amount per invoice

4. **Payment Schedule**

    - Set recurring payment
    - Auto-create transaction setiap bulan
    - Link ke invoice

5. **Approval Flow**
    - Transaction > Rp X perlu approval
    - Status: draft → pending → approved
    - Notification ke approver

## Support

Untuk pertanyaan atau issue, check:

-   Laravel docs: https://laravel.com/docs
-   Filament docs: https://filamentphp.com/docs
-   Livewire docs: https://livewire.laravel.com
