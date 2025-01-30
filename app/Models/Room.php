<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'rooms';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['name', 'room_type_id', 'status'];

    /**
     * ความสัมพันธ์: Room belongs to RoomType
     */
    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}

