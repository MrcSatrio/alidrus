<?php

// app/Models/Siswa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'id_siswa';

    protected $fillable = ['nama_siswa', 'id_kelas', 'nisn_siswa'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function akun()
    {
        return $this->hasOne(Akun::class, 'id_siswa', 'id_siswa');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_siswa', 'id_siswa');
    }
}

