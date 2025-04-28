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
                                    {{ $user->nama }}
                                </div>

                                <strong>Nilai Akhir :</strong> {{ $user->nilai_akhir ?? ' ... ' }}<br>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Detail Data</h4>
                                <!-- Tombol Print -->

                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="printableArea">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ $user->nama ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>NIS</th>
                                                <td>{{ $user->nis ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <th>{{ $user->role == 'guru' ? 'NUPTK' : 'NISN' }}</th>
                                            <td>{{ $user->nisn ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ $user->jenis_kelamin ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>{{ $user->tempat_lahir ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>{{ $user->tanggal_lahir ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>Jurusan</th>
                                                <td>{{ $user->jurusan ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <th>Agama</th>
                                            <td>{{ $user->agama ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>No Telepon</th>
                                            <td>{{ $user->no_telfon ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>NIK</th>
                                            <td>{{ $user->nik ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $user->alamat ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td>{{ $user->nama_ayah ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td>{{ $user->nama_ibu ?? '-' }}</td>
                                        </tr>

                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>Asal Sekolah</th>
                                                <td>{{ $user->asal_sekolah ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <th>Jumlah Saudara</th>
                                            <td>{{ $user->jumlah_saudara ?? '-' }}</td>
                                        </tr>


                                        @if ($user->role == 'siswa')
                                            <tr>
                                                <th>Tanggal Masuk</th>
                                                <td>{{ $user->tanggal_masuk ?? '-' }}</td>
                                            </tr>
                                        @endif

                                        @if ($user->role == 'guru')
                                            <tr>
                                                <th>Tanggal Masuk Guru</th>
                                                <td>{{ $user->tanggal_masuk_guru ?? '-' }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Form Kirim Laporan</h4>
                            </div>
                            <div class="card-body">
                                <p>Silakan isi form berikut untuk mengirim laporan.</p>

                                <form action="{{ route('data-laporan.kirim', $user->id) }}" method="POST" onsubmit="return validateForm();">
                                    @csrf
                                    @method('POST')

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan..." required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-warning mr-2">
                                        <i class="fas fa-paper-plane"></i> Pindah
                                    </button>
                                </form>
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
