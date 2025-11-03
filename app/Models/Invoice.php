<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'purchase_order_id',
        'vendor_name',
        'vendor_email',
        'vendor_phone',
        'vendor_address',
        'invoice_date',
        'due_date',
        'status',
        'subtotal',
        'tax',
        'discount',
        'total',
        'paid_amount',
        'balance',
        'notes',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
        'paid_amount' => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function calculateTotal(): void
    {
        $this->subtotal = $this->items()->sum('total');
        $this->total = $this->subtotal + $this->tax - $this->discount;
        $this->balance = $this->total - $this->paid_amount;
        $this->save();
    }

    public function updatePaymentStatus(): void
    {
        $this->paid_amount = $this->payments()->sum('amount');
        $this->balance = $this->total - $this->paid_amount;

        if ($this->paid_amount >= $this->total) {
            $this->status = 'paid';
        } elseif ($this->paid_amount > 0) {
            $this->status = 'partial';
        } else {
            $this->status = 'unpaid';
        }

        $this->save();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            if (!$invoice->invoice_number) {
                $invoice->invoice_number = 'INV-' . date('Y') . '-' . str_pad(static::max('id') + 1, 5, '0', STR_PAD_LEFT);
            }
            $invoice->balance = $invoice->total;
        });

        static::saving(function ($invoice) {
            if ($invoice->isDirty(['subtotal', 'tax', 'discount'])) {
                $invoice->total = $invoice->subtotal + $invoice->tax - $invoice->discount;
                $invoice->balance = $invoice->total - $invoice->paid_amount;
            }
        });
    }
}
