<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

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
        'role',
        'tanggal_masuk',
        'tanggal_masuk_guru',
        'keterangan',
        'nilai_akhir',
    ];
}
