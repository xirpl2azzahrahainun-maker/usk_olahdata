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
            Detail Data Peserta
        </div>
        <div class="card-body">
            <table class="table table-striped align-middle">
                <tr>
                    <th style="width: 200px;">NIK</th>
                    <td>{{ $peserta->nik }}</td>
                </tr>
                <tr>
                    <th>Nama Peserta</th>
                    <td class="fw-bold">{{ $peserta->nama }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $peserta->email }}</td>
                </tr>
                <tr>
                    <th>No. Telepon / HP</th>
                    <td>{{ $peserta->telepon ?? $peserta->no_hp }}</td>
                </tr>
                <tr>
                    <th>Skema Sertifikasi</th>
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $peserta->skema->nama_skema ?? 'Belum ada skema' }}
                        </span>
                    </td>
                </tr>
            </table>

            <!-- Tombol Aksi -->
            <div class="mt-4 d-flex gap-2">
                <!-- Kembalinya mengarah ke route manual kamu -->
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                
               <!-- Tombol Edit: Hanya muncul jika akun yang login adalah ADMIN ATAU pemilik data tersebut -->
@if(auth()->user()->role === 'admin' || $peserta->user_id === auth()->id())
    <a href="{{ route('peserta.edit', $peserta->id) }}" class="btn btn-warning">Edit Data Saya</a>
@endif
            </div>
        </div>
    </div>
</div>
@endsection