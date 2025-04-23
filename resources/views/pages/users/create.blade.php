@extends('layouts.app')

@section('title', 'Add User')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></div>
                <div class="breadcrumb-item">Add</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>NISN / NUPTK</label>
                            <input type="text" name="nisn" class="form-control" required value="{{ old('nisn') }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control selectric" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
