<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'room_types';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['name', 'description'];

    /**
     * ความสัมพันธ์: RoomType has many Rooms
     */
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
