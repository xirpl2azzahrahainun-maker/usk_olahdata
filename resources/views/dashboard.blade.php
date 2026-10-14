@extends('layouts.app')

@section('content')

<style>
    .custom-color {
        background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
        color: white;
    }

    .btn-color {
        background: linear-gradient(120deg, #502d0a, #a36b31, #edd987);
        border: none;
    }
</style>

<div class="container py-5">

    <!-- Banner -->
    <div class="p-5 mb-5 text-center shadow hero-banner rounded-3 custom-color">
        <h1 class="mb-3 fw-bold">
            Selamat Datang, {{ auth()->user()->username ?? 'Pengguna' }}!
        </h1>

        <p class="mb-2 fs-4">
            Sistem Data Peserta Sertifikasi
        </p>

        <p class="mb-4 text-white-50">
            Kelola data peserta dan skema sertifikasi dengan mudah dan aman.
        </p>

        <div class="gap-2 d-flex justify-content-center">
            <a href="{{ route('peserta.index') }}"
               class="px-4 py-2 btn btn-color text-light fw-bold">
                Data Peserta
            </a>

            <a href="{{ route('dataskema.index') }}"
               class="px-4 py-2 btn btn-outline-light">
                Data Skema
            </a>
        </div>
    </div>

    <!-- Statistik -->
    {{-- ga perlu di tampilkan ke user , karena akses dashboard mereka tampilin punya mereka --}}
      @if(auth()->user()->role === 'admin')
    <div class="row g-4">
        <!-- Total Skema -->
        <div class="col-md-6">
            <div class="border-0 shadow-sm card h-100">
                <div class="py-4 text-center card-body">
                    <h5 class="mb-3 card-title fw-bold text-muted">Total Skema Sertifikasi</h5>
                    <h2 class="card-text display-4 fw-bold">
                        {{ $totalskema ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>

        <!-- Total Peserta -->
        <div class="col-md-6">
            <div class="border-0 shadow-sm card h-100">
                <div class="py-4 text-center card-body">
                    <h5 class="mb-3 card-title fw-bold text-muted">Total Peserta</h5>
                    <h2 class="card-text display-4 fw-bold">
                        {{ $totalpeserta ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>

@endsection
