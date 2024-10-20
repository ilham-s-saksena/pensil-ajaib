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
    $table->string('image_url')->nullable();
    $table->unsignedBigInteger('category_id')->nullable();
    $table->enum('status', ['Belum Diambil', 'Diambil', 'Selesai'])->default('Belum Diambil');
    $table->unsignedBigInteger('taken_by')->nullable();
    $table->timestamp('taken_at')->nullable();
    $table->timestamps();

    $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
    $table->foreign('taken_by')->references('id')->on('users')->onDelete('set null');
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
