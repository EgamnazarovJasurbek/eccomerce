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
        Schema::create('blog_products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->text('body_uz');
            $table->text('body_ru');
            $table->text('body_en');
            $table->string('image');
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_products');
    }
};
