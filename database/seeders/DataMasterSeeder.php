<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataMaster;
use Illuminate\Support\Str;

class DataMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = ['Laki - laki', 'Perempuan'];
        $jurusan = ['Teknik Komputer', 'Akuntansi', 'Teknik Mesin', 'Multimedia'];
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'];

        for ($i = 1; $i <= 20; $i++) {
            $gender = $genders[array_rand($genders)];
            $data = [
                'nama' => 'Nama Siswa ' . $i,
                'nis' => '10' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nisn' => '5001' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'jenis_kelamin' => $gender,
                'tempat_lahir' => 'Kota ' . $i,
                'tanggal_lahir' => now()->subYears(rand(15, 18))->subDays(rand(1, 365))->format('Y-m-d'),
                'jurusan' => $jurusan[array_rand($jurusan)],
                'agama' => $agama[array_rand($agama)],
                'no_telfon' => '08' . rand(1111111111, 9999999999),
                'nik' => (string)rand(3175091001000000, 3175091999999999),
                'alamat' => 'Alamat No. ' . $i,
                'nama_ayah' => 'Ayah ' . $i,
                'nama_ibu' => 'Ibu ' . $i,
                'asal_sekolah' => 'SMP Negeri ' . rand(1, 50),
                'jumlah_saudara' => rand(0, 5),
                'tanggal_masuk' => now()->subYears(rand(0, 2))->format('Y-m-d'),
                'tanggal_masuk_guru' => null, // Jika tidak ada, bisa null
            ];

            DataMaster::create($data);
        }
    }
}
