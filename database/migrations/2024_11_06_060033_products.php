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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id'); 
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->string('product_name');
            $table->text('description');
            $table->unsignedInteger('price'); // Menggunakan unsignedInteger agar harga tidak bisa negatif
            $table->unsignedInteger('stok_quantity'); // Menggunakan unsignedInteger agar stok tidak bisa negatif
            $table->string('image1_url')->nullable(); // Menambahkan nullable untuk kolom gambar
            $table->string('image2_url')->nullable();
            $table->string('image3_url')->nullable();
            $table->string('image4_url')->nullable();
            $table->string('image5_url')->nullable();
            $table->timestamps(); // Menggantikan penulisan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
