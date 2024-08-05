<?php

// app/Models/Transaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'id_transactions';

    protected $fillable = ['id_jenis_transaksi', 'id_siswa', 'total_pembayaran', 'notes'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function jenisTransaksi()
    {
        return $this->belongsTo(JenisTransaksi::class, 'id_jenis_transaksi', 'id_jenis_transaksi');
    }
}

