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
        Schema::create('batiks', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('uuid_user');
            $table->foreign('uuid_user')->references('uuid')->on('users');
            $table->string('uuid_category');
            $table->foreign('uuid_category')->references('uuid')->on('categories');
            $table->string('catalog_picture');
            $table->string('name');
            $table->string('product_url');
            $table->string('motive_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batiks');
    }
};
