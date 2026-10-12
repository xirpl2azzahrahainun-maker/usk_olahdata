<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@extends('layouts.app')

@section('content')

<style>
    .custom-color{
        Background: linear-gradient(120deg, #235347 , #163B32 , #0B2B26, #051F20);
    }

    .btn-color{
        background: linear-gradient(120deg,#502d0a ,#a36b31, #edd987);
        border: none;
        
    }
    </style>

    

<div class="container py-5">

    <!-- Banner -->
    <div class="hero-banner text-center rounded-3 shadow custom-color">

        <h1 class="fw-bold">
            Selamat Datang 
        </h1>

        <p class="fs-4 mb-2">
            Sistem Data Peserta Sertifikasi
        </p>

        <p class="mb-4">
            Kelola data peserta dan skema sertifikasi dengan mudah.
        </p>

        <a href="{{ route('peserta.Datapeserta') }}"
           class="btn btn-color text-light  fw-bold me-2">
            Data Peserta
        </a>

        <a href="{{ route('dataskema.index') }}"
           class="btn btn-outline-light">
            Data Skema
        </a>

    </div>

    <!-- Statistik -->
    <div class="row mt-5">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Total Skema Sertifikasi</h5>
                    
                    <h2 class="card-text display-4 fw-bold">
                        {{ $totalskema }}
                    </h2>

                </div>
            </div>
    </div>

    <!-- total peserta -->  
    <div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body text-center">
            <h5 class="card-title fw-bold">Total Peserta</h5>

            <h2 class="card-text display-4 fw-bold">
                {{ $totalpeserta }}
            </h2>
        </div>
    </div>
</div>

                    

</div>

@endsection