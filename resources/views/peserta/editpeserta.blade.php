<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
<style>
 .custom-color{
        Background: linear-gradient(120deg,#235347 , #163B32 , #0B2B26, #051F20 );
    }

    .btn-color{
        background: linear-gradient(120deg,#502d0a ,#a36b31);
        border: none;
        
    }
</style>

<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header custom-color text-white fw-bold">
            Edit Data Peserta
        </div>
        <div class="card-body">
            <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $peserta->nik) }}" readonly>
                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Peserta</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $peserta->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $peserta->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon', $peserta->telepon ?? $peserta->no_hp) }}" required>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Skema Sertifikasi</label>
                    <select name="skema_id" class="form-select @error('skema_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Skema --</option>
                        @foreach($skemas as $skema)
                            <option value="{{ $skema->id }}" {{ (old('skema_id', $peserta->skema_id) == $skema->id) ? 'selected' : '' }}>
                                {{ $skema->nama_skema }}
                            </option>
                        @endforeach
                    </select>
                    @error('skema_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-color text-light fw-bold">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection