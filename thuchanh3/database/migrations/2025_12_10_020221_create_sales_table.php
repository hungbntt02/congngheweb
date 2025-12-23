<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // INT PRIMARY KEY
            // Khóa ngoại tham chiếu medicine_id trong bảng medicines
            // Đảm bảo medicine_id là tên cột khóa chính trong bảng medicines
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines');
            
            $table->integer('quantity'); // INT
            $table->dateTime('sale_date')->useCurrent(); // DATETIME
            $table->string('customer_phone', 10)->nullable(); // VARCHAR(10)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};