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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('kost_id')->constrained('kosts');
            $table->decimal('total', 10, 2);
            $table->enum('status', ['Menunggu Pembayaran', 'Dibayar', 'Selesai']);
            $table->date('tanggal_reservasi'); // Tambahkan kolom tanggal reservasi
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
