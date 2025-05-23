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
        Schema::create('card_versions', function (Blueprint $table) {
            $table->id();
            // $table->string('version_id');
            // $table->string('card_id');
            $table->foreignId('version_id')->constrained('id')->on('versions')->onDelete('cascade');
            $table->foreignId('card_id')->constrained('id')->on('cards')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_versions');
    }
};
