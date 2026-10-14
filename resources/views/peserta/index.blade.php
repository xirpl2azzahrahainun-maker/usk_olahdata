<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')

<style>
    .btn-color{
        background: linear-gradient(120deg,#235347 , #163B32 , #0B2B26, #051F20);
        border: none;
    }

    .custom-color{
        background: linear-gradient(120deg,#235347 , #163B32 , #0B2B26, #051F20);
    }
</style>

<div class="container mt-4">

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Data Peserta Sertifikasi</h2>

        <!-- TOMBOL TAMBAH: HANYA MUNCUL UNTUK ADMIN -->
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('peserta.create') }}"
               class="btn btn-color text-light fw-bold">
                Tambah Peserta
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('peserta.index') }}"
          method="GET"
          class="gap-2 mb-3 d-flex">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari nama atau NIK..."
               value="{{ $search ?? '' }}">

        <button type="submit"
                class="btn btn-secondary">
            Cari
        </button>

    </form>

    <div class="shadow-sm card">
        <div class="table-responsive">
            <table class="table align-middle table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Peserta</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Skema</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pesertas as $index => $p)
                    <tr>
                        <td>
                            {{ $pesertas->firstItem() + $index }}
                        </td>
                        <td>
                            {{ $p->nik }}
                        </td>
                        <td>
                            {{ $p->nama }}
                        </td>
                        <td>
                            {{ $p->email }}
                        </td>
                        <td>
                            {{ $p->telepon }}
                        </td>
                        <td>
                            {{ $p->skema->nama_skema ?? '-' }}
                        </td>
                        <td>
                            <!-- DETAIL: Bisa dilihat oleh Admin maupun User biasa -->
                            <a href="{{ route('peserta.show', ['peserta' => $p->id]) }}"
                               class="text-white btn btn-info custom-color">
                                Detail
                            </a>

                            <!-- TOMBOL UBAH & HAPUS: HANYA MUNCUL UNTUK ADMIN -->

                                <a href="{{ route('peserta.edit', ['peserta' => $p->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    Ubah
                                </a>
                             @if(auth()->user()->role === 'admin')
                                <form action="{{ route('peserta.destroy', ['peserta' => $p->id]) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus data peserta ini?')">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7"
                            class="text-center text-muted">
                            Belum ada data peserta.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $pesertas->links() }}
        </div>
    </div>
</div>

@endsection
