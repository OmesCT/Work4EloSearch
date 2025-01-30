<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerHotel extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'customer_hotels';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['customer_id', 'hotel_id', 'check_in_date', 'check_out_date'];

    /**
     * ความสัมพันธ์: CustomerHotel belongs to Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * ความสัมพันธ์: CustomerHotel belongs to Hotel
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
