# Filament Finance Dashboard

## Overview

Dashboard keuangan telah berhasil dibuat dan terintegrasi dengan Filament Admin Panel. Dashboard akan otomatis muncul ketika admin login ke sistem.

## Akses Dashboard

-   **URL**: http://localhost/admin atau http://127.0.0.1:8000/admin
-   **Login**: Gunakan kredensial admin yang sudah ada
-   **Lokasi**: Dashboard muncul di halaman utama Filament setelah login

## Widget yang Tersedia

### 1. Finance Stats Widget

**Lokasi**: Paling atas (Sort: 1)
**Tipe**: Stats Overview (4 kartu statistik)
**Fitur**:

-   Total Income (Bulan ini) - Hijau dengan trend
-   Total Expense (Bulan ini) - Merah dengan trend
-   Net Profit/Loss (Bulan ini) - Biru/Merah tergantung hasil
-   Total Transactions (Bulan ini) - Info
-   Perbandingan dengan bulan sebelumnya (persentase naik/turun)
-   Mini chart 7 hari terakhir pada setiap kartu

**Data**:

-   Menggunakan data Transaction dari database
-   Filter: Bulan berjalan
-   Real-time calculation

### 2. Transaction Chart Widget

**Lokasi**: Kedua (Sort: 2)
**Tipe**: Pie Chart
**Fitur**:

-   Perbandingan Income vs Expense
-   Warna: Hijau (Income) vs Merah (Expense)
-   Format: Juta Rupiah
-   Interactive tooltip dengan nilai detail

**Data**:

-   Income total bulan ini
-   Expense total bulan ini
-   Auto-update ketika ada transaksi baru

### 3. Latest Transactions Widget

**Lokasi**: Ketiga (Sort: 3)
**Tipe**: Table Widget
**Fitur**:

-   10 transaksi terakhir
-   Kolom: Date, Type, Category, Description, Amount, Payment Method, Vendor/Customer, Reference
-   Badge berwarna untuk Type (hijau=income, merah=expense)
-   Amount dengan format IDR dan warna sesuai tipe
-   Search & Sort pada setiap kolom
-   Pagination (10/25/50 per page)

**Filter Tersedia**:

-   Type: Income / Expense
-   Payment Method: Cash / Bank Transfer / Credit Card / Check
-   Category: Sales, Office Supplies, Utilities, Salary, Marketing, Rent, Services, Materials, Consulting, Other
-   Date Range: From Date & Until Date

**Aksi**:

-   Click row untuk detail
-   Export (jika perlu tambahkan)

### 4. Category Breakdown Widget

**Lokasi**: Keempat (Sort: 4)
**Tipe**: Bar Chart
**Fitur**:

-   Breakdown pengeluaran per kategori
-   Bulan berjalan
-   Sorted dari yang terbesar
-   10 warna berbeda untuk kategori
-   Format: Juta Rupiah

**Data**:

-   Total expense per kategori
-   Grouping dan aggregation
-   Visual comparison antar kategori

## File Terkait

### Widget Files

```
app/Filament/Widgets/
├── FinanceStatsWidget.php          (Stats dengan trend comparison)
├── TransactionChartWidget.php       (Pie chart Income vs Expense)
├── LatestTransactionsWidget.php     (Table dengan filter lengkap)
└── CategoryBreakdownWidget.php      (Bar chart kategori expense)
```

### Model yang Digunakan

-   **Transaction Model**: `app/Models/Transaction.php`
    -   Fields: id, type, category, description, amount, transaction_date, payment_method, vendor_customer, reference_number, notes, attachment
    -   Enum Type: income, expense
    -   Enum Payment: cash, bank_transfer, credit_card, check

### Database

-   **Table**: transactions
-   **Seeders**: TransactionSeeder.php (270+ dummy data)
-   **Connection**: MySQL via XAMPP

## Cara Kerja

### Auto-Registration

Widget Filament otomatis ter-register ke panel admin. Tidak perlu konfigurasi manual di `AdminPanelProvider.php` kecuali ingin custom order atau visibility.

### Widget Order

Order widget dikontrol oleh property `$sort`:

-   Sort 1: FinanceStatsWidget (paling atas)
-   Sort 2: TransactionChartWidget
-   Sort 3: LatestTransactionsWidget
-   Sort 4: CategoryBreakdownWidget (paling bawah)

### Responsive Layout

-   `$columnSpan = 'full'`: Widget menggunakan full width
-   Filament otomatis adjust layout untuk mobile/tablet
-   Grid system 12 kolom

### Data Refresh

-   Dashboard data di-refresh setiap kali halaman di-load
-   Real-time data dari database
-   Bisa add polling untuk auto-refresh: `protected static ?string $pollingInterval = '15s';`

## Customization

### Menambah Filter Global

Edit widget dan tambah property:

```php
protected static ?string $filters = 'date_range';
```

### Mengubah Polling Interval

Tambahkan di widget class:

```php
protected static ?string $pollingInterval = '30s'; // Auto refresh setiap 30 detik
```

### Menyembunyikan Widget

Tambahkan di widget class:

```php
public static function canView(): bool
{
    return auth()->user()->can('view_finance_dashboard');
}
```

### Custom Column Width

Ganti `$columnSpan`:

```php
protected int | string | array $columnSpan = [
    'md' => 2,
    'xl' => 3,
];
```

## Testing

### Manual Testing

1. Buka browser: http://localhost/admin
2. Login dengan admin credentials
3. Cek dashboard muncul dengan 4 widgets
4. Test filter pada Latest Transactions
5. Hover pada charts untuk tooltip
6. Check responsive di mobile view

### Data Verification

```bash
# Check transaction count
php artisan tinker
>>> App\Models\Transaction::count()

# Check income total
>>> App\Models\Transaction::where('type', 'income')->sum('amount')

# Check expense total
>>> App\Models\Transaction::where('type', 'expense')->sum('amount')
```

## Troubleshooting

### Widget Tidak Muncul

```bash
php artisan optimize:clear
php artisan filament:cache-components
```

### Error di Chart

-   Check Chart.js loaded: Filament include otomatis
-   Verify data format di `getData()` method
-   Console browser untuk error JavaScript

### Filter Tidak Bekerja

-   Clear browser cache
-   Check Livewire version compatibility
-   Verify query dalam filter closure

### Performance Issue

-   Add database indexes:

```sql
CREATE INDEX idx_transaction_date ON transactions(transaction_date);
CREATE INDEX idx_type ON transactions(type);
CREATE INDEX idx_category ON transactions(category);
```

## Next Steps (Optional)

### Export Functionality

Tambah button export CSV/PDF pada Latest Transactions:

```php
use Filament\Tables\Actions\ExportAction;

->headerActions([
    ExportAction::make()
])
```

### Advanced Filters

Tambah saved filters untuk quick access:

-   Hari ini
-   Minggu ini
-   Bulan ini
-   3 bulan terakhir

### Notification

Tambah notification untuk transaksi besar atau anomali:

```php
if ($amount > 50000000) {
    Notification::make()
        ->warning()
        ->title('Large Transaction Alert')
        ->send();
}
```

### Permission Management

Setup role & permission untuk dashboard visibility:

```php
Gate::define('view-finance-dashboard', function ($user) {
    return $user->hasRole(['admin', 'finance']);
});
```

## Notes

-   ✅ Dashboard fully integrated dengan Filament Admin Panel
-   ✅ Tidak perlu frontend terpisah
-   ✅ Menggunakan Transaction model yang sudah ada
-   ✅ Real-time data dari database MySQL
-   ✅ Responsive design otomatis
-   ✅ Filter & search functionality
-   ✅ Professional UI dengan Tailwind CSS

## Support

Jika ada pertanyaan atau butuh customization lebih lanjut, silakan update widget files di `app/Filament/Widgets/`.
