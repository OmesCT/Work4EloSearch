<?php

namespace App\Models;

use illuminate\Database\Realtions\HasMany;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'teachers';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number'];

    /**
     * ความสัมพันธ์: Teacher has many Courses
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
