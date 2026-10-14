<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <style>
        .custom-color {
            Background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
        }
    </style>
    <div class="container mt-4">

        <div class="shadow-sm card">

            <div class="text-white card-header custom-color fw-bold">

                <h5 class="mb-0">
                    Ubah Skema Sertifikasi
                </h5>

            </div>

            <div class="card-body">

                <form action="{{ route('dataskema.update', $dataskema->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Kode Skema
                        </label>

                        <input type="text" name="kode_skema"
                            class="form-control @error('kode_skema') is-invalid @enderror"
                            value="{{ old('kode_skema', $dataskema->kode_skema) }}" required>

                        @error('kode_skema')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Skema
                        </label>

                        <input type="text" name="nama_skema"
                            class="form-control @error('nama_skema') is-invalid @enderror"
                            value="{{ old('nama_skema', $dataskema->nama_skema) }}" required>

                        @error('nama_skema')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Skema</label>

                        <select name="tipe_skema" class="form-control" required>
                            <option value="">-- Pilih Jenis Skema --</option>

                            <option value="KKNI" {{ $dataskema->tipe_skema == 'KKNI' ? 'selected' : '' }}>
                                KKNI
                            </option>

                            <option value="OKUPASI" {{ $dataskema->tipe_skema == 'OKUPASI' ? 'selected' : '' }}>
                                Okupasi
                            </option>

                            <option value="KLASTER" {{ $dataskema->tipe_skema == 'KLASTER' ? 'selected' : '' }}>
                                Klaster
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $dataskema->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="gap-2 d-flex">

                        <a href="{{ route('dataskema.index') }}" class="btn btn-secondary">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-warning">
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
