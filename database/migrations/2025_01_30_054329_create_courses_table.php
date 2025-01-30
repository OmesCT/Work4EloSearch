<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_code')->unique(); // รหัสวิชา เช่น CS101
            $table->string('name'); // ชื่อวิชา
            $table->text('description')->nullable(); // คำอธิบายวิชา
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // เชื่อมกับ teachers
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
