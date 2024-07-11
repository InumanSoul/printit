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
            $table->string('image')->nullable();
            $table->string('name');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->string('barcode')->nullable();
            $table->string('cost')->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('is_composite')->default(false);
            $table->integer('inventory')->default(0)->nullable();
            $table->boolean('inventory_enabled')->default(false);
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('user_id')->constrained('users');
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
