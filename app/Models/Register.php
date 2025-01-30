<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Register extends Model
{
    // กำหนด table name (ถ้าจำเป็น)
    protected $table = 'registers';

    // กำหนด attributes ที่สามารถ fill ได้
    protected $fillable = ['student_id', 'course_id'];

    /**
     * ความสัมพันธ์: Register belongs to Student
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * ความสัมพันธ์: Register belongs to Course
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
