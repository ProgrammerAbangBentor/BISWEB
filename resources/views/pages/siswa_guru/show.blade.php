@extends('layouts.app')

@section('title', 'Biodata Pengguna')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Biodata {{ ucfirst($data->role) }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('data-master.index') }}">Data Master</a></div>
                <div class="breadcrumb-item active">Biodata</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-start">

                    <!-- Kolom kiri: Foto dan Nama -->
                    <div class="text-center pr-4">
                        <img src="{{ asset('img/avatar.png') }}" alt="Foto Pengguna" width="150" class="mb-2">
                        <h6 class="font-weight-bold text-uppercase">{{ $data->nama }}</h6>
                    </div>

                    <!-- Kolom kanan: Biodata -->
                    <div style="width: 100%;">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="mb-0">Biodata {{ ucfirst($data->role) }}</h5>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-print"></i> Cetak</a>
                        </div>

                        <table class="table table-bordered table-sm">
                            <tr><td width="30%">Nama</td><td>: {{ $data->nama }}</td></tr>

                            @if($data->role === 'siswa')
                                <tr><td>NIS</td><td>: {{ $data->nis }}</td></tr>
                                <tr><td>NISN</td><td>: {{ $data->nisn }}</td></tr>
                                <tr><td>Jurusan</td><td>: {{ $data->jurusan }}</td></tr>
                                <tr><td>Asal Sekolah</td><td>: {{ $data->asal_sekolah }}</td></tr>
                            @elseif($data->role === 'guru')
                                <tr><td>NUPTK</td><td>: {{ $data->nisn }}</td></tr>
                            @endif

                            <tr><td>Jenis Kelamin</td><td>: {{ $data->jenis_kelamin }}</td></tr>
                            <tr><td>Tempat Tgl Lahir</td><td>: {{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</td></tr>
                            <tr><td>Agama</td><td>: {{ $data->agama }}</td></tr>
                            <tr><td>No Telpon</td><td>: {{ $data->no_telp }}</td></tr>
                            <tr><td>NIK</td><td>: {{ $data->nik }}</td></tr>
                            <tr><td>Alamat</td><td>: {{ $data->alamat }}</td></tr>

                            @if($data->role === 'siswa')
                                <tr><td>Nama Ayah</td><td>: {{ $data->nama_ayah ?? '...' }}</td></tr>
                                <tr><td>Nama Ibu</td><td>: {{ $data->nama_ibu ?? '...' }}</td></tr>
                                <tr><td>Jumlah Saudara</td><td>: {{ $data->jumlah_saudara }}</td></tr>
                            @endif
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
