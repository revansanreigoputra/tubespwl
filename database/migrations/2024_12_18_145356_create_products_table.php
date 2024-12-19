<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // kolom id
        $table->string('name'); // kolom nama produk
        $table->text('description'); // kolom deskripsi
        $table->decimal('price', 10, 2); // kolom harga
        $table->integer('stock'); // kolom stok
        $table->timestamps(); // kolom created_at dan updated_at
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
