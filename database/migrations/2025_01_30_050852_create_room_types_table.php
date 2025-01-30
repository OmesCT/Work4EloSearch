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
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // ชื่อประเภทห้อง
            $table->text('description')->nullable(); // คำอธิบาย (อาจว่างได้)
            $table->decimal('price', 10, 2); // ราคาต่อคืน
            $table->integer('capacity'); // จำนวนคนที่รองรับได้
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_types');
    }
};
