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
            $table->decimal('total', 10, 2);
            $table->enum('status', ['Menunggu Pembayaran', 'Dibayar',  'Dibatalkan', 'Selesai']);
            $table->date('tanggal_reservasi');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
