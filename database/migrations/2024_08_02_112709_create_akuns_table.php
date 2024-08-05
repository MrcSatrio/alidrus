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
    Schema::create('akun', function (Blueprint $table) {
        $table->id('id_akun');
        $table->unsignedBigInteger('id_siswa');
        $table->unsignedBigInteger('id_role');
        $table->string('username')->unique();
        $table->string('password');
        $table->timestamps();

        $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
        $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade'); // Asumsi bahwa ada tabel 'roles' dengan kolom 'id_role'
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
