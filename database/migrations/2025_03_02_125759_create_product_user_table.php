<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('product_user', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->default(1);
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->foreignId('order_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('product_user');
    }
};
