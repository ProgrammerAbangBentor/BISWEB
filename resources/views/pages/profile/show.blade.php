@extends('layouts.app')

@section('title', 'Profile-User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">{{ $user->name }}</h2>
                <p class="section-lead">
                    Informasi lengkap tentang akun ini.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image"
                                    src="{{ asset('img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture">
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">
                                    Hi!! {{ $user->name }}
                                </div>
                                <div class="mt-3">
                                    <strong>Email:</strong> {{ $user->email }} <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Detail Data</h4>
                                <!-- Tombol Print -->
                                <button onclick="printProfile()" class="btn btn-primary btn-sm">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="printableArea">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ $dataMaster->nama ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>NIS</th>
                                                <td>{{ $dataMaster->nis ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <th>{{ $user->role == 'guru' ? 'NUPTK' : 'NISN' }}</th>
                                            <td>{{ $dataMaster->nisn ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ $dataMaster->jenis_kelamin ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>{{ $dataMaster->tempat_lahir ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>{{ $dataMaster->tanggal_lahir ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>{{ $dataMaster->jurusan ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <th>Agama</th>
                                            <td>{{ $dataMaster->agama ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>No Telepon</th>
                                            <td>{{ $dataMaster->no_telfon ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>NIK</th>
                                            <td>{{ $dataMaster->nik ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $dataMaster->alamat ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td>{{ $dataMaster->nama_ayah ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td>{{ $dataMaster->nama_ibu ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>Asal Sekolah</th>
                                                <td>{{ $dataMaster->asal_sekolah ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <th>Jumlah Saudara</th>
                                            <td>{{ $dataMaster->jumlah_saudara ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>Tanggal Masuk</th>
                                                <td>{{ $dataMaster->tanggal_masuk ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        @if ($user->role == 'guru')
                                            <tr>
                                                <th>Tanggal Masuk Guru</th>
                                                <td>{{ $dataMaster->tanggal_masuk_guru ?? '-' }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Script Print -->
    <script>
        function printProfile() {
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload(); // Reload setelah print supaya normal lagi
        }
    </script>
@endpush
