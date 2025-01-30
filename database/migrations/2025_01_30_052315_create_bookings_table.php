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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_hotels_id')->constrained('customer_hotels')->onDelete('cascade'); // ลูกค้าที่ทำการจอง
            $table->foreignId('rooms_id')->constrained()->onDelete('cascade'); // ห้องที่ถูกจอง
            $table->date('check_in_date'); // วันที่เข้าพัก
            $table->date('check_out_date'); // วันที่ออก
            $table->decimal('total_price', 10, 2); // ราคารวม
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'checked_in', 'checked_out'])->default('pending'); // สถานะการจอง
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
