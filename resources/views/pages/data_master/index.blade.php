@extends('layouts.app')

@section('title', 'Data Master')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Master</h1>
                <div class="section-header-button">
                    <a href="{{ route('data-master.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Master</div>
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
                                <!-- Filter Form -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <form method="GET" action="{{ route('data-master.index') }}" class="form-inline">
                                            <div class="input-group mr-2">
                                                <input type="text" class="form-control" placeholder="Search by name" name="search" value="{{ request('search') }}">
                                            </div>
                                            <div class="input-group mr-2">
                                                <input type="text" class="form-control" placeholder="Search by Jurusan" name="search_jurusan" value="{{ request('search_jurusan') }}">
                                            </div>
                                            <div class="input-group mr-2">
                                                <input type="text" class="form-control" placeholder="Search by Tahun Masuk" name="search_tahun_masuk" value="{{ request('search_tahun_masuk') }}">
                                            </div>
                                            <div class="input-group mr-2">
                                                <select name="role" class="form-control selectric">
                                                    <option value="">All Roles</option>
                                                    <option value="siswa" {{ request('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                                    <option value="guru" {{ request('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Data Table -->
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <!-- Label ID Dinamis sesuai Role -->
                                                <th>
                                                    @if(request('role') == 'siswa')
                                                        ID Pelajar
                                                    @elseif(request('role') == 'guru')
                                                        ID Guru
                                                    @else
                                                        NISN / NUPTK
                                                    @endif
                                                </th>
                                                <th>Role</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->nama }}</td>
                                                    <!-- Menampilkan nisn untuk siswa, nip untuk guru -->
                                                    <td>
                                                        @if($item->role == 'siswa')
                                                            {{ $item->nisn }}
                                                        @elseif($item->role == 'guru')
                                                            {{ $item->nisn }} <!-- Menggunakan nisn tapi labelnya diubah jadi ID Guru -->
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->role }}</td>
                                                    <td>
                                                        @if($item->role == 'siswa' && $item->tanggal_masuk)
                                                            {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}
                                                        @elseif($item->role == 'guru' && $item->tanggal_masuk_guru)
                                                            {{ \Carbon\Carbon::parse($item->tanggal_masuk_guru)->format('d M Y') }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="d-flex">

                                                            <a href="{{ route('data-master.show', $item->id) }}" class="btn btn-sm btn-primary mr-2">
                                                                <i class="fas fa-eye"></i> Detail
                                                            </a>
                                                            <a href="{{ route('data-master.edit', $item->id) }}" class="btn btn-sm btn-info mr-2">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <form action="{{ route('data-master.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="float-right mt-3">
                                    {{ $data->withQueryString()->links() }}
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
