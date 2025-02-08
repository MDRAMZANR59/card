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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('platform_id')->references('id')->on('platforms')->onDelete('cascade');
            $table->string('title');
            $table->string('usage');
            $table->string('deliveryTime');
            // $table->string('version_id');
            // $table->string('ammount_id');
            $table->string('qty');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
