<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'bookings';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['customer_hotel_id', 'room_id', 'booking_date', 'check_in_date', 'check_out_date'];

    /**
     * ความสัมพันธ์: Booking belongs to CustomerHotel
     */
    public function customerHotel()
    {
        return $this->belongsTo(CustomerHotel::class);
    }

    /**
     * ความสัมพันธ์: Booking belongs to Room
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
