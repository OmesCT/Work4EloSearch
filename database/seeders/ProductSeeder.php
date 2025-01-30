<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Customer;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        // สร้างข้อมูล Product 20 ชิ้น
        Product::factory(20)->create();
    
        // สร้างข้อมูล Order 5 ออร์เดอร์
        Order::factory(5)
            ->has(OrderDetail::factory()->count(3)) // สร้าง OrderDetail 3 รายการต่อ 1 Order
            ->create();
    }
    
}
