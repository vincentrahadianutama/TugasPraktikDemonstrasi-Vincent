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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 100); // Nama pelanggan (maksimal 100 karakter)
            $table->string('email', 150)->unique(); // Email unik
            $table->string('password'); // Password akan disimpan dalam format hash
            $table->string('phone', 15)->nullable(); // Nomor telepon (opsional, maksimal 15 karakter)
            $table->text('address1')->nullable(); // Alamat utama (opsional)
            $table->text('address2')->nullable(); // Alamat tambahan 1 (opsional)
            $table->text('address3')->nullable(); // Alamat tambahan 2 (opsional)
            $table->timestamps(); // created_at dan updated_at otomatis
            $table->softDeletes(); // Menambahkan deleted_at untuk soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers'); // Menghapus tabel jika ada
    }
};
