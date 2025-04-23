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
        Schema::create('data_master', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nis')->nullable(); // untuk siswa
            $table->string('nisn')->nullable(); // bisa jadi NIP untuk guru
            $table->enum('jenis_kelamin', ['Laki - laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jurusan')->nullable(); // opsional untuk guru
            $table->string('agama');
            $table->string('no_telfon')->nullable();
            $table->string('nik')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->date('tanggal_masuk')->nullable(); // untuk siswa
            $table->date('tanggal_masuk_guru')->nullable(); // untuk guru
            $table->enum('role', ['siswa', 'guru']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_master');
    }
};
