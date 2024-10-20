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
       Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description');
    $table->string('category');
    $table->string('image')->nullable(); // Gambar optional
    $table->unsignedBigInteger('user_id')->nullable(); // User yang mengambil orderan
    $table->enum('status', ['pending', 'taken'])->default('pending'); // Status orderan
    $table->timestamps();
    
    // Foreign key relationship
    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
