@extends('layouts.app')

@section('title', 'Laporan')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active">Laporan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Data Laporan Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIS/NUPTK</th>
                                    <th>Role</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporans as $laporan)
                                    <tr>
                                        <td>{{ $laporan->nama }}</td>
                                        <td>{{ $laporan->nisn }}</td>
                                        <td>{{ ucfirst($laporan->role) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($laporan->created_at)->format('d M Y') }}</td>
                                        <td>{{ $laporan->keterangan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right mt-3">
                        {{ $laporans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
