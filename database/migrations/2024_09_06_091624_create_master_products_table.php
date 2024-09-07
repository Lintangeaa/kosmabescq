<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('slug', 250);
            $table->decimal('price', 10, 2);
            $table->integer('room');
            $table->string('location', 10000);
            $table->enum('category', ['hotel', 'guest-house', 'villa']);
            $table->text('facilities')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->text('surrounding_places')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_products');
    }
};
