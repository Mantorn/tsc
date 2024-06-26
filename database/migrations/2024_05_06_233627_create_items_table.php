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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('producer');
            $table->string('unit');
            $table->decimal('weight', 16, 8)->nullable();
            $table->decimal('radius', 16, 8)->nullable();
            $table->decimal('length', 16, 8)->nullable();
            $table->decimal('width', 16, 8)->nullable();
            $table->decimal('depth', 16, 8)->nullable();
            $table->decimal('size', 16, 8)->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
