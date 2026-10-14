@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .custom-color {
                Background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
            }

            .btn-color {
                background: linear-gradient(120deg, #502d0a, #a36b31);
                border: none;

            }
        </style>

        <div class="border-0 shadow-sm card">

            <div class="text-white card-header custom-color fw-bold">
                Tambah Data Peserta
            </div>

            <div class="card-body">

                <form action="{{ route('peserta.store') }}" method="POST">


                    @csrf
                    <div class="row">
                        <div class="mb-3  col-md-6">
                            <label class="form-label">
                                NIK
                            </label>

                            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') }}" required>

                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}" required>

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">
                                Email
                            </label>

                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">
                                No. Telepon
                            </label>

                            <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                value="{{ old('telepon') }}" required>

                            @error('telepon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">
                                Skema Sertifikasi
                            </label>

                            <select name="skema_id" class="form-select" required>
                                <option value="">-- Pilih Skema --</option>

                                @foreach ($skemas as $skema)
                                    <option value="{{ $skema->id }}">
                                        {{ $skema->nama_skema }}
                                    </option>
                                @endforeach
                            </select>

                            @error('skema_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="gap-2 d-flex">

                        <a href="{{ route('peserta.index') }}" class="mt-5 btn btn-secondary">
                            Batal
                        </a>

                        <button type="submit" class="mt-5 btn btn-color text-light fw-bold">
                            Simpan Data
                        </button>

                    </div>

                </form>

            </div>

        </div>


    </div>
@endsection
