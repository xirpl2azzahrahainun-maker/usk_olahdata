
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

<div class="container mt-4">


<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Data Skema Sertifikasi</h2>

    @if(auth()->user()->role === 'admin')
    <a href="{{ route('dataskema.create') }}" class="btn custom-color text-white fw-bold">
        + Tambah Skema
    </a>
    @endif

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Kode Skema</th>
                    <th>Nama Skema</th>
                    <th>Deskripsi</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($skemas as $index => $skema)

                <tr>

                    <td>
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $skema->kode_skema }}
                    </td>

                    <td>
                        {{ $skema->nama_skema }}
                    </td>

                    <td>{{ $skema->tipe_skema }}</td>

                    <td>
                        {{ $skema->deskripsi }}
                    </td>

                    <td>
                      
                        <a href="{{ route('dataskema.show', $skema->id) }}"
                           class="btn btn-color text-white fw-bold btn-sm">
                            show
                        </a>
                        

  @if(auth()->user()->role === 'admin')
                        <a href="{{ route('dataskema.edit', $skema->id) }}"
                           class="btn btn-warning btn-sm">
                            Ubah
                        </a>
                        @endif

                          @if(auth()->user()->role === 'admin')
                        <form action="{{ route('dataskema.destroy', $skema->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus skema ini?')">
                                Hapus
                            </button>

                        </form>
                        @endif

                         

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center text-muted">
                        Belum ada data skema.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


</div>

@endsection
