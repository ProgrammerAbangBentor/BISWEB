<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMaster extends Model
{
    use HasFactory;

    protected $table = 'data_master';

    protected $fillable = [
        'nama',
        'nis',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'agama',
        'no_telfon',
        'nik',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'asal_sekolah',
        'jumlah_saudara',
        'tanggal_masuk',
        'tanggal_masuk_guru',
        'role',
    ];
}

