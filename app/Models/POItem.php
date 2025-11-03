<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class POItem extends Model
{
    protected $table = 'po_items';

    protected $fillable = [
        'purchase_order_id',
        'item_name',
        'description',
        'quantity',
        'received_quantity',
        'unit_price',
        'total',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'received_quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
            $item->total = $item->quantity * $item->unit_price;
        });

        static::saved(function ($item) {
            $item->purchaseOrder->calculateTotal();
        });

        static::deleted(function ($item) {
            $item->purchaseOrder->calculateTotal();
        });
    }
}
