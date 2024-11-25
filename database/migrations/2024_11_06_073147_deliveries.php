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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('order_id'); // Foreign key
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');  
            $table->datetime('shipping_date');
            $table->string('tracking_code');
            $table->string('status');
            $table->timestamps(); // Auto created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries'); // Drop whole table
    }
};
