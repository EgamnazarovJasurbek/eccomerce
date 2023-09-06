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
        Schema::create('order_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('img')->nullable();
            $table->string('description_uz')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('calc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_customers');
    }
};
