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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id('id_transactions');
        $table->unsignedBigInteger('id_jenis_transaksi');
        $table->unsignedBigInteger('id_siswa');
        $table->decimal('total_pembayaran', 15, 2); // Menambahkan precision dan scale untuk decimal
        $table->timestamps();

        $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
        $table->foreign('id_jenis_transaksi')->references('id_jenis_transaksi')->on('jenis_transaksi')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
