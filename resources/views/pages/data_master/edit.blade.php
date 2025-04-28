@extends('layouts.app')

@section('title', 'Edit Data Master')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Master</h1>
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
                                <form method="POST" action="{{ route('data-master.update', $dataMaster->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Nama -->
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $dataMaster->nama) }}" required>
                                    </div>

                                    <!-- Jenis Kelamin -->
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                            <option value="Laki - laki" {{ $dataMaster->jenis_kelamin == 'Laki - laki' ? 'selected' : '' }}>Laki - laki</option>
                                            <option value="Perempuan" {{ $dataMaster->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>

                                    <!-- Tempat Lahir -->
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $dataMaster->tempat_lahir) }}" required>
                                    </div>

                                    <!-- Tanggal Lahir -->
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $dataMaster->tanggal_lahir) }}" required>
                                    </div>

                                    <!-- Agama -->
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama', $dataMaster->agama) }}" required>
                                    </div>

                                    <!-- No Telepon -->
                                    <div class="form-group">
                                        <label for="no_telfon">No Telepon</label>
                                        <input type="text" name="no_telfon" id="no_telfon" class="form-control" value="{{ old('no_telfon', $dataMaster->no_telfon) }}">
                                    </div>

                                    <!-- NIK -->
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik', $dataMaster->nik) }}">
                                    </div>

                                    <!-- Alamat -->
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control">{{ old('alamat', $dataMaster->alamat) }}</textarea>
                                    </div>

                                    <!-- Nama Ayah -->
                                    <div class="form-group">
                                        <label for="nama_ayah">Nama Ayah</label>
                                        <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" value="{{ old('nama_ayah', $dataMaster->nama_ayah) }}">
                                    </div>

                                    <!-- Nama Ibu -->
                                    <div class="form-group">
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" value="{{ old('nama_ibu', $dataMaster->nama_ibu) }}">
                                    </div>

                                    <!-- Asal Sekolah -->
                                    <div class="form-group" id="asal_sekolah_container">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" value="{{ old('asal_sekolah', $dataMaster->asal_sekolah) }}">
                                    </div>

                                    <!-- Jurusan -->
                                    <div class="form-group" id="jurusan_container">
                                        <label for="jurusan">Jurusan</label>
                                        <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $dataMaster->jurusan) }}">
                                    </div>

                                    <!-- NIS -->
                                    <div class="form-group" id="nis_container">
                                        <label for="nis">NIS</label>
                                        <input type="text" name="nis" id="nis" class="form-control" value="{{ old('nis', $dataMaster->nis) }}">
                                    </div>

                                    <!-- Role -->
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="siswa" {{ $dataMaster->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                            <option value="guru" {{ $dataMaster->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                        </select>
                                    </div>

                                    <!-- NISN / NIP -->
                                    <div class="form-group">
                                        <label for="nisn" id="nisn-label">ID Pelajar</label>
                                        <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn', $dataMaster->nisn) }}" required>
                                    </div>

                                    <!-- Tanggal Masuk Siswa -->
                                    <div class="form-group" id="tanggal_masuk_siswa_container">
                                        <label for="tanggal_masuk">Tanggal Masuk Siswa</label>
                                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $dataMaster->tanggal_masuk) }}">
                                    </div>

                                    <!-- Tanggal Masuk Guru -->
                                    <div class="form-group" id="tanggal_masuk_guru_container">
                                        <label for="tanggal_masuk_guru">Tanggal Masuk Guru</label>
                                        <input type="date" name="tanggal_masuk_guru" id="tanggal_masuk_guru" class="form-control" value="{{ old('tanggal_masuk_guru', $dataMaster->tanggal_masuk_guru) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nilai_akhir">Nilai Akhir</label>
                                        <input type="text" name="nilai_akhir" id="nilai_akhir" class="form-control" value="{{ old('nilai_akhir', $dataMaster->nilai_akhir) }}">

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
            function toggleFieldsByRole(role) {
                const nisnLabel = document.getElementById('nisn-label');
                const tanggalMasukGuruContainer = document.getElementById('tanggal_masuk_guru_container');
                const tanggalMasukSiswaContainer = document.getElementById('tanggal_masuk_siswa_container');
                const nisContainer = document.getElementById('nis_container');
                const jurusanContainer = document.getElementById('jurusan_container');
                const asalSekolahContainer = document.getElementById('asal_sekolah_container');

                if (role === 'guru') {
                    nisnLabel.textContent = 'ID Guru';
                    tanggalMasukGuruContainer.style.display = 'block';
                    tanggalMasukSiswaContainer.style.display = 'none';
                    nisContainer.style.display = 'none';
                    jurusanContainer.style.display = 'none';
                    asalSekolahContainer.style.display = 'none';
                } else {
                    nisnLabel.textContent = 'ID Pelajar';
                    tanggalMasukGuruContainer.style.display = 'none';
                    tanggalMasukSiswaContainer.style.display = 'block';
                    nisContainer.style.display = 'block';
                    jurusanContainer.style.display = 'block';
                    asalSekolahContainer.style.display = 'block';
                }
            }

            // Jalankan saat halaman dimuat
            document.addEventListener('DOMContentLoaded', function () {
                const role = document.getElementById('role').value;
                toggleFieldsByRole(role);
            });

            // Jalankan saat ada perubahan
            document.getElementById('role').addEventListener('change', function () {
                toggleFieldsByRole(this.value);
            });
        </script>
    @endpush
@endsection
