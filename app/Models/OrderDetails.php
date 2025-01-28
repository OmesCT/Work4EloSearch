<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // ความสัมพันธ์กับ Order (แต่ละ OrderDetail เชื่อมโยงกับ Order หนึ่ง)
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // ความสัมพันธ์กับ Product (แต่ละ OrderDetail เชื่อมโยงกับ Product หนึ่ง)
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

