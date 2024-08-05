<?php

// app/Models/JenisTransaksi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    use HasFactory;

    protected $table = 'jenis_transaksi';

    protected $primaryKey = 'id_jenis_transaksi';

    protected $fillable = ['nama_jenis_transaksi'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_jenis_transaksi', 'id_jenis_transaksi');
    }
}

