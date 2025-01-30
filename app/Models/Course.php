<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    // กำหนดชื่อ table ถ้าจำเป็น
    protected $table = 'courses';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['name', 'description', 'teacher_id'];

    /**
     * ความสัมพันธ์: Course belongs to Teacher
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * ความสัมพันธ์: Course belongs to many Students
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'registers');
    }
}
