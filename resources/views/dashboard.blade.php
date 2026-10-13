@extends('layouts.app')

@section('content')

<style>
    .custom-color {
        background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
        color: white; /* Supaya teks di banner jelas terbaca */
    }

    .btn-color {
        background: linear-gradient(120deg, #502d0a, #a36b31, #edd987);
        border: none;
    }
</style>

<div class="container py-5">

    <!-- Banner -->
    <div class="hero-banner text-center p-5 rounded-3 shadow custom-color mb-5">
        <h1 class="fw-bold mb-3">
            Selamat Datang, {{ auth()->user()->username ?? 'Pengguna' }}!
        </h1>

        <p class="fs-4 mb-2">
            Sistem Data Peserta Sertifikasi
        </p>

        <p class="mb-4 text-white-50">
            Kelola data peserta dan skema sertifikasi dengan mudah dan aman.
        </p>

        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('peserta.index') }}"
               class="btn btn-color text-light fw-bold px-4 py-2">
                Data Peserta
            </a>

            <a href="{{ route('dataskema.index') }}"
               class="btn btn-outline-light px-4 py-2">
                Data Skema
            </a>
        </div>
    </div>

    <!-- Statistik -->
    <div class="row g-4">
        <!-- Total Skema -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center py-4">
                    <h5 class="card-title fw-bold text-muted mb-3">Total Skema Sertifikasi</h5>
                    <h2 class="card-text display-4 fw-bold text-success">
                        {{ $totalskema ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>

        <!-- Total Peserta --> 
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center py-4">
                    <h5 class="card-title fw-bold text-muted mb-3">Total Peserta</h5>
                    <h2 class="card-text display-4 fw-bold text-primary">
                        {{ $totalpeserta ?? 0 }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection