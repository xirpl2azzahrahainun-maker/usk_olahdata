<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan Model User sudah di-import di atas

class PesertaController extends Controller
{

public function index(Request $request)
{
    $search = $request->input('search');
    $user = auth()->user();

    $query = Peserta::with(['user', 'skema']);

    // Admin melihat semua peserta, termasuk yang user_id-nya NULL.
    if ($user->role !== 'admin') {
        $query->where('user_id', $user->id);
    }

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%");
        });
    }

    $pesertas = $query->paginate(10);

    return view('peserta.index', compact('pesertas', 'search'));
}


    public function create()
    {
        // Hanya admin yang boleh menambahkan peserta.
        abort_unless(auth()->user()->role === 'admin', 403);

        $skemas = Skema::all();

        return view('peserta.createpeserta', compact('skemas'));
    }


public function store(Request $request)
{
    abort_unless(auth()->user()->role === 'admin', 403);

    $validated = $request->validate([
        'nama'     => 'required|string|max:255',
        'nik'      => 'required|string|max:255|unique:pesertas,nik',
        'email'    => [
            'required',
            'email',
            'max:255',
            // Ubah dari 'peserta' menjadi 'user' sesuai database Anda
            function ($attribute, $value, $fail) {
                $user = User::where('email', $value)->where('role', 'user')->first();
                if (!$user) {
                    $fail('Email harus sesuai dengan akun user yang sudah terdaftar.');
                }
            },
        ],
        'telepon'  => 'required|string|max:20',
        'skema_id' => 'required|exists:skemas,id',
    ]);

    // Ambil ID user berdasarkan email yang diinput
    $userPeserta = User::where('email', $request->email)->first();
    $validated['user_id'] = $userPeserta ? $userPeserta->id : null;

    Peserta::create($validated);

    return redirect()
        ->route('peserta.index')
        ->with('success', 'Data peserta berhasil ditambahkan.');
}


    public function show(Peserta $peserta)
    {
        $user = auth()->user();

        // User hanya boleh membuka detail miliknya sendiri.
        abort_if(
            $user->role !== 'admin' && $peserta->user_id != $user->id,
            403
        );

        $peserta->load(['user', 'skema']);

        return view('peserta.showpeserta', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $user = auth()->user();

        abort_if(
            $user->role !== 'admin' && $peserta->user_id != $user->id,
            403
        );

        $skemas = Skema::all();

        return view('peserta.editpeserta', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $user = auth()->user();

        abort_if(
            $user->role !== 'admin' && $peserta->user_id != $user->id,
            403
        );

        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'nik'      => 'required|string|max:255|unique:pesertas,nik,' . $peserta->id,
            'email'    => 'required|email|max:255',
            'telepon'  => 'required|string|max:20',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        // User tidak boleh memindahkan kepemilikan data.
        // Admin juga tidak mengubah user_id melalui form.


        //harusnya menambahkan update user juga , jadi ketika nama di peserta di ubah .. ini terhubung ke user
     $peserta->update($validated);

    if ($peserta->user_id) {
        $peserta->user()->update([
            'username' => $request->nama,
            'email'    => $request->email,
        ]);
    }
    return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        // Hanya admin yang boleh menghapus peserta.
        abort_unless(auth()->user()->role === 'admin', 403);

        $peserta->delete();

        return redirect()
            ->route('peserta.index')
            ->with('success', 'Data peserta berhasil dihapus.');
    }
}
