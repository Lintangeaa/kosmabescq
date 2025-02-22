<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStatusColumnInReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Mengubah tipe kolom 'status' menjadi string
            $table->string('status')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Mengubah kembali kolom 'status' ke enum
            $table->enum('status', ['Menunggu Pembayaran', 'Dibayar', 'Dibatalkan', 'Selesai'])->change();
        });
    }
}
