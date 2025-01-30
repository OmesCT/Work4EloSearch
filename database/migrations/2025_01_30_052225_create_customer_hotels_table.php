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
        Schema::create('customer_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // ชื่อจริง
            $table->string('last_name'); // นามสกุล
            $table->string('email')->unique(); // อีเมล (ไม่ซ้ำกัน)
            $table->string('phone_number'); // เบอร์โทรศัพท์
            $table->string('identity_number')->unique(); // หมายเลขบัตรประชาชนหรือพาสปอร์ต
            $table->date('date_of_birth')->nullable(); // วันเกิด (สามารถว่างได้)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_hotels');
    }
};
