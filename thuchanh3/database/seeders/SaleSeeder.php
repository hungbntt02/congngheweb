<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Medicine; // Giả sử bạn đã tạo Model Medicine

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy ID của thuốc mẫu
        $panadolId = DB::table('medicines')->where('name', 'Paracetamol 500mg')->value('medicine_id');
        $amoxId = DB::table('medicines')->where('name', 'Amoxicillin 250mg')->value('medicine_id');
        
        DB::table('sales')->insert([
            [
                'medicine_id' => $panadolId,
                'quantity' => 5,
                'sale_date' => now()->subDays(2), // Bán cách đây 2 ngày
                'customer_phone' => '0901234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'medicine_id' => $amoxId,
                'quantity' => 2,
                'sale_date' => now()->subDay(), // Bán cách đây 1 ngày
                'customer_phone' => null, // Tùy chọn, không có số điện thoại
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}