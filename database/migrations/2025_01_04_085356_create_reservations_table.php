<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_id', 11);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('kost_id')->constrained('kosts');
            $table->text('alamat')->nullable();
            $table->string('no_hp', 15);
            $table->decimal('total', 10, 2);
            $table->string('status');
            $table->date('tanggal_reservasi');
            $table->date('tanggal_keluar');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
