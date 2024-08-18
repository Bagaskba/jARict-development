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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('username');
            $table->string('email')->unique();;
            $table->string('password');
            $table->enum('role', ['1', '2'])->default('2'); // 1: Admin, 2: Store
            $table->string('store_name')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
