<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'po_number',
        'quotation_id',
        'vendor_name',
        'vendor_email',
        'vendor_phone',
        'vendor_address',
        'po_date',
        'expected_delivery',
        'status',
        'subtotal',
        'tax',
        'discount',
        'total',
        'notes',
        'terms_conditions',
    ];

    protected $casts = [
        'po_date' => 'date',
        'expected_delivery' => 'date',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(POItem::class);
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    public function calculateTotal(): void
    {
        $this->subtotal = $this->items()->sum('total');
        $this->total = $this->subtotal + $this->tax - $this->discount;
        $this->save();
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($po) {
            if (!$po->po_number) {
                $po->po_number = 'PO-' . date('Y') . '-' . str_pad(static::max('id') + 1, 5, '0', STR_PAD_LEFT);
            }
        });

        static::saving(function ($po) {
            if ($po->isDirty(['subtotal', 'tax', 'discount'])) {
                $po->total = $po->subtotal + $po->tax - $po->discount;
            }
        });
    }
}
