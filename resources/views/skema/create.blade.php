<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')

<style>
    .custom-color {
        background: linear-gradient(
            120deg,
            #235347,
            #163B32,
            #0B2B26,
            #051F20
        );
    }

    .btn-color {
        background: linear-gradient(
            120deg,
            #502d0a,
            #a36b31
        );
        border: none;
    }
</style>

<div class="container mt-4">

    <div class="card shadow-sm">

        <!-- HEADER -->
        <div class="card-header custom-color text-white">
            <h5 class="mb-0">
                Tambah Skema Sertifikasi
            </h5>
        </div>


        <!-- BODY -->
        <div class="card-body">

            <form action="{{ route('dataskema.store') }}" method="POST">

                @csrf


                <!-- KODE SKEMA -->
                <div class="mb-3">

                    <label class="form-label">
                        Kode Skema
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="Otomatis"
                        readonly
                    >

                    <small class="text-muted">
                        Kode skema akan dibuat otomatis oleh sistem.
                    </small>

                </div>


                <!-- NAMA SKEMA -->
                <div class="mb-3">

                    <label class="form-label">
                        Nama Skema
                    </label>

                    <input
                        type="text"
                        name="nama_skema"
                        class="form-control @error('nama_skema') is-invalid @enderror"
                        value="{{ old('nama_skema') }}"
                        placeholder="Masukkan nama skema"
                        required
                    >

                    @error('nama_skema')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- JENIS SKEMA -->
                <div class="mb-3">

                    <label class="form-label">
                        Jenis Skema
                    </label>

                    <select
                        name="tipe_skema"
                        class="form-control @error('tipe_skema') is-invalid @enderror"
                        required
                    >

                        <option value="">
                            -- Pilih Jenis Skema --
                        </option>

                        <option
                            value="KKNI"
                            {{ old('tipe_skema') == 'KKNI' ? 'selected' : '' }}
                        >
                            KKNI
                        </option>

                        <option
                            value="OKUPASI"
                            {{ old('tipe_skema') == 'OKUPASI' ? 'selected' : '' }}
                        >
                            Okupasi
                        </option>

                        <option
                            value="KLASTER"
                            {{ old('tipe_skema') == 'KLASTER' ? 'selected' : '' }}
                        >
                            Klaster
                        </option>

                    </select>

                    @error('tipe_skema')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- DESKRIPSI -->
                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        class="form-control @error('deskripsi') is-invalid @enderror"
                        rows="4"
                        placeholder="Masukkan deskripsi skema"
                    >{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- BUTTON -->
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('dataskema.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-color text-white fw-bold"
                    >
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection