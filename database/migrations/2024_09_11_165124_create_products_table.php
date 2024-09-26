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
            $table->foreignId('main_shop_id')->constrained()->onDelete('restrict');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->string('name');
            $table->string('image');
            $table->string('valyuta');
            $table->bigInteger('price');
            $table->bigInteger('count');
            $table->boolean('is_deleted')->default(true);
            $table->timestamps();
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
