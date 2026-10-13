@extends('layouts.app')

@section('content')

<div class="container py-4">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .custom-color {
        background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
    }

    .btn-color {
        background: linear-gradient(120deg, #502d0a, #a36b31);
        border: none;
    }
</style> 

<div class="card shadow-sm border-0">

    <div class="card-header custom-color text-white fw-bold">
        Tambah Data Akun User
    </div>

    <div class="card-body">

        <!-- Mengarah ke route store user -->
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Username / Nama Lengkap -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Username / Nama</label>
                    <input type="text"
                           name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           value="{{ old('username') }}"
                           placeholder="Masukkan username atau nama"
                           required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email aktif"
                           required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Minimal 6 karakter"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Role Hak Akses</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex gap-2">
                <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">
                    Batal
                </a>

                <button type="submit" class="btn btn-color text-light fw-bold mt-3">
                    Simpan User
                </button>
            </div>

        </form>

    </div>

</div>

</div>

@endsection