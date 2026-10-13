@extends('layouts.app')

@section('content')

<div class="container py-4">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .custom-color {
        background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
    }

    .btn-color {
        background: linear-gradient(120deg, #502d0a, #a36b31);
        border: none;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Akun User</h2>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('user.create') }}" class="btn custom-color text-white fw-bold">
            + Tambah User
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">

        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th width="60">No</th>
                    <th>Username / Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="200" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $index => $u)
                <tr>
                    <td>
                        {{ $users->firstItem() + $index ?? $index + 1 }}
                    </td>
                    <td class="fw-bold">
                        {{ $u->username ?? '-' }}
                    </td>
                    <td>
                        {{ $u->email ?? '-' }}
                    </td>
                    <td>
                        <span class="badge {{ $u->role === 'admin' ? 'bg-danger' : 'bg-success' }}">
                            {{ ucfirst($u->role) }}
                        </span>
                    </td>
                    <td class="text-center">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('user.edit', $u->id) }}"
                               class="btn btn-warning btn-sm">
                                Ubah
                            </a>
                        @endif

                        @if(auth()->user()->role === 'admin')
                            <form action="{{ route('user.destroy', $u->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data user ini?')">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        Belum ada data user yang terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if(method_exists($users, 'links'))
            <div class="mt-3">
                {{ $users->links() }}
            </div>
        @endif

    </div>
</div>

</div>

@endsection