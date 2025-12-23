<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol 500mg',
                'brand' => 'Panadol',
                'dosage' => '500mg tablets',
                'form' => 'Viên nén',
                'price' => 15000.00, 
                'stock' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amoxicillin 250mg',
                'brand' => 'Amox',
                'dosage' => '250mg capsules',
                'form' => 'Viên nang',
                'price' => 25000.50,
                'stock' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siro Ho',
                'brand' => 'Bổ phế',
                'dosage' => '100ml syrup',
                'form' => 'Xi-rô',
                'price' => 45000.00,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}