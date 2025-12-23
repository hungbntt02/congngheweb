<?php
use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); // INT PRIMARY KEY
            $table->string('name', 255); // VARCHAR(255)
            $table->string('brand', 100)->nullable(); // VARCHAR(100)
            $table->string('dosage', 50); // VARCHAR(50)
            $table->string('form', 50); // VARCHAR(50)
            $table->decimal('price', 10, 2); // DECIMAL(10, 2)
            $table->integer('stock'); // INT
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};