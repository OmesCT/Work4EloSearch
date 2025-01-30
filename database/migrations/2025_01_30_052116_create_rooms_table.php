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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_type_id')->constrained()->onDelete('cascade'); // เชื่อมกับ room_types
            $table->string('room_number')->unique(); // เลขที่ห้อง
            $table->integer('floor'); // ชั้นของห้อง
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available'); // สถานะห้อง
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
