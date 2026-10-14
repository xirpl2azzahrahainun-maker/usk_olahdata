
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
    <div class="border-0 shadow-sm card">
        <div class="text-white card-header custom-color fw-bold">
            Detail Data Skema Sertifikasi
        </div>
        <div class="card-body">
            <table class="table align-middle table-striped">
                <tr>
                    <th style="width: 200px;">Kode Skema</th>
                    <td>{{ $dataskema->kode_skema }}</td>
                </tr>
                <tr>
                    <th>Nama Skema</th>
                    <td class="fw-bold">{{ $dataskema->nama_skema }}</td>
                </tr>

                <tr>
                    <th>Jenis Skema</th>
                    <td class="fw-bold">{{ $dataskema->tipe_skema }}</td>
                </tr>

                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $dataskema->deskripsi }}</td>
                </tr>

            </table>

            <!-- Tombol Aksi -->
            <div class="gap-2 mt-4 d-flex">
                <!-- Kembalinya mengarah ke route manual kamu -->
                <a href="{{ route('dataskema.index') }}" class="btn btn-secondary">Kembali</a>

                 @if(auth()->user()->role === 'admin')
                <!-- Edit mengarah ke route edit dengan parameter ID peserta -->
                <a href="{{ route('dataskema.edit', $dataskema->id) }}" class="btn btn-warning">Edit Data</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
