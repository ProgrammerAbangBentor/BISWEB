@extends('layouts.app')

@section('title', 'Add Data Master')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Data Master</h1>
                <div class="section-header-button">
                    <a href="{{ route('data-master.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('data-master.store') }}">
                                    @csrf

                                     <!-- Role -->
                                     <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="siswa">Siswa</option>
                                            <option value="guru">Guru</option>
                                        </select>
                                    </div>

                                    <!-- Nama -->
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" required>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                            <option value="Laki - laki">Laki - laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <!-- Tempat Lahir -->
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                                    </div>

                                    <!-- Agama -->
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" name="agama" id="agama" class="form-control" required>
                                    </div>

                                    <!-- No Telepon -->
                                    <div class="form-group">
                                        <label for="no_telfon">No Telepon</label>
                                        <input type="text" name="no_telfon" id="no_telfon" class="form-control">
                                    </div>

                                    <!-- NIK -->
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control">
                                    </div>

                                    <!-- Alamat -->
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    </div>

                                    <!-- Nama Ayah -->
                                    <div class="form-group">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control">
                                    </div>

                                    <!-- Nama Ibu -->
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control">
                                    </div>

                                    <!-- Asal Sekolah -->
                                    <div class="form-group" id="asal_sekolah_container" style="display: none;">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control">
                                    </div>

                                    <!-- Jurusan -->
                                    <div class="form-group" id="jurusan_container" style="display: none;">
                                        <label for="jurusan">Jurusan</label>
                                        <input type="text" name="jurusan" id="jurusan" class="form-control">
                                    </div>

                                    <!-- NIS -->
                                    <div class="form-group" id="nis_container" style="display: none;">
                                        <label for="nis">NIS</label>
                                        <input type="text" name="nis" id="nis" class="form-control">
                                    </div>



                                    <!-- NISN / NIP -->
                                    <div class="form-group">
                                        <label for="nisn" id="nisn-label">ID Pelajar</label>
                                        <input type="text" name="nisn" id="nisn" class="form-control" required>
                                    </div>

                                    <!-- Tanggal Masuk Siswa -->
                                    <div class="form-group" id="tanggal_masuk_siswa_container">
                                        <label for="tanggal_masuk">Tanggal Masuk Siswa</label>
                                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                                    </div>

                                    <!-- Tanggal Masuk Guru -->
                                    <div class="form-group" id="tanggal_masuk_guru_container" style="display: none;">
                                        <label for="tanggal_masuk_guru">Tanggal Masuk Guru</label>
                                        <input type="date" name="tanggal_masuk_guru" id="tanggal_masuk_guru" class="form-control">
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            document.getElementById('role').addEventListener('change', function () {
                const role = this.value;
                const nisnLabel = document.getElementById('nisn-label');
                const tanggalMasukGuruContainer = document.getElementById('tanggal_masuk_guru_container');
                const tanggalMasukSiswaContainer = document.getElementById('tanggal_masuk_siswa_container');
                const nisContainer = document.getElementById('nis_container');
                const jurusanContainer = document.getElementById('jurusan_container');
                const asalSekolahContainer = document.getElementById('asal_sekolah_container');

                if (role === 'guru') {
                    nisnLabel.textContent = 'NUPTK (Nomor Unik Pendidik dan Tenaga Kependidikan)'; // Ubah label menjadi ID Guru
                    tanggalMasukGuruContainer.style.display = 'block'; // Tampilkan field tanggal masuk guru
                    tanggalMasukSiswaContainer.style.display = 'none'; // Sembunyikan tanggal masuk siswa
                    nisContainer.style.display = 'none'; // Sembunyikan NIS
                    jurusanContainer.style.display = 'none'; // Sembunyikan Jurusan
                    asalSekolahContainer.style.display = 'none'; // Sembunyikan Asal Sekolah
                } else {
                    nisnLabel.textContent = 'NISN (Nomor Induk Siswa Nasional)'; // Kembalikan label menjadi ID Pelajar
                    tanggalMasukGuruContainer.style.display = 'none'; // Sembunyikan field tanggal masuk guru
                    tanggalMasukSiswaContainer.style.display = 'block'; // Tampilkan tanggal masuk siswa
                    nisContainer.style.display = 'block'; // Tampilkan NIS
                    jurusanContainer.style.display = 'block'; // Tampilkan Jurusan
                    asalSekolahContainer.style.display = 'block'; // Tampilkan Asal Sekolah
                }
            });
        </script>
    @endpush
@endsection
