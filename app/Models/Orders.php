<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    protected $fillable = ['customer_id', 'order_date', 'total'];

    // ความสัมพันธ์กับ OrderDetail (หนึ่ง Order มีหลาย OrderDetail)
    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    // ความสัมพันธ์กับ Customer (หนึ่ง Order เชื่อมโยงกับ Customer หนึ่ง)
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
