<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'students';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'year'];

    /**
     * ความสัมพันธ์: Student has many Registers
     */
    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    /**
     * ความสัมพันธ์: Student belongs to many Courses
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'registers');
    }
}
