<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Customer extends Model
{
    protected $fillable = ['name', 'email', 'address'];

    // ความสัมพันธ์กับ Order (หนึ่ง Customer มีหลาย Order)
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
