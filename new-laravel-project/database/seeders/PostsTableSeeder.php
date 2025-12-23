<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Import lớp Faker
use Illuminate\Support\Facades\DB; // Import lớp DB

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Khởi tạo Faker
        $faker = Faker::create();

        // Lặp 10 lần để tạo 10 bài viết mẫu (có thể thay đổi số lượng)
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence, // Tạo một câu ngẫu nhiên làm tiêu đề
                'content' => $faker->paragraph, // Tạo một đoạn văn ngẫu nhiên làm nội dung
                'created_at' => now(), // Thêm thời gian tạo
                'updated_at' => now(), // Thêm thời gian cập nhật
            ]);
        }
    }
}