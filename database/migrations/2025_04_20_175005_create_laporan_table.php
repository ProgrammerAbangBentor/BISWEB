<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->nullable();
            $table->string('nisn');
            $table->enum('jenis_kelamin', ['Laki - laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jurusan')->nullable();
            $table->string('agama');
            $table->string('no_telfon')->nullable();
            $table->string('nik')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->enum('role', ['siswa', 'guru']);
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_masuk_guru')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
