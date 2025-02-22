<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostsTable extends Migration
{
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('user_id');
            $table->boolean('aktif');
            $table->foreignId('address_id')->constrained('addresses');
            $table->decimal('harga', 10, 2);
            $table->text('fasilitas');
            $table->text('informasi');
            $table->integer('total_kamar');
            $table->text('alamat_lengkap');
            $table->text('gmap');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kosts');
    }
}
