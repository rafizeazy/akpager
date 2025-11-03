<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quotation extends Model
{
    protected $fillable = [
        'quotation_number',
        'vendor_name',
        'vendor_email',
        'vendor_phone',
        'vendor_address',
        'quotation_date',
        'valid_until',
        'status',
        'subtotal',
        'tax',
        'discount',
        'total',
        'notes',
    ];

    protected $casts = [
        'quotation_date' => 'date',
        'valid_until' => 'date',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'discount' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(QuotationItem::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class, 'converted_to_po_id');
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

        static::creating(function ($quotation) {
            if (!$quotation->quotation_number) {
                $quotation->quotation_number = 'QUO-' . date('Y') . '-' . str_pad(static::max('id') + 1, 5, '0', STR_PAD_LEFT);
            }
        });

        static::saving(function ($quotation) {
            if ($quotation->isDirty(['subtotal', 'tax', 'discount'])) {
                $quotation->total = $quotation->subtotal + $quotation->tax - $quotation->discount;
            }
        });
    }
}
