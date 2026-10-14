<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{

    public function index()
    {
        $skemas = Skema::all();

        return view('skema.index', compact('skemas'));
    }



    public function create()
    {
        return view('skema.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama_skema' => 'required',
            'tipe_skema' => 'required|in:KKNI,OKUPASI,KLASTER',
            'deskripsi' => 'nullable',
        ]);
        $nextId = (Skema::max('id') ?? 0) + 1;
        $kodeSkema = 'K' . str_pad(
            $nextId,
            3,
            '0',
            STR_PAD_LEFT
        );
        while (Skema::where('kode_skema', $kodeSkema)->exists()) {
            $nextId++;

            $kodeSkema = 'K' . str_pad(
                $nextId,
                3,
                '0',
                STR_PAD_LEFT
            );
        }
        Skema::create([
            'kode_skema' => $kodeSkema,
            'nama_skema' => $request->nama_skema,
            'tipe_skema' => $request->tipe_skema,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('dataskema.index')
            ->with('success', 'Skema sertifikasi berhasil ditambahkan.');
    }



    public function show(Skema $dataskema)
    {
        $dataskema->load('peserta');

        return view('skema.show', compact('dataskema'));
    }



    public function edit(Skema $dataskema)
    {
        return view('skema.edit', compact('dataskema'));
    }



    public function update(Request $request, Skema $dataskema)
    {
        $request->validate([
            'kode_skema' => 'required|unique:skemas,kode_skema,' . $dataskema->id,
            'nama_skema' => 'required',
            'tipe_skema' => 'required|in:KKNI,OKUPASI,KLASTER' .$dataskema->id,
            'deskripsi' => 'nullable',
        ]);

        $dataskema->update([
            'kode_skema' => $request->kode_skema,
            'nama_skema' => $request->nama_skema,
            'tipe_skema' => $request->tipe_skema,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('dataskema.index')
            ->with('success', 'Skema sertifikasi berhasil diperbarui.');
    }



    public function destroy(Skema $dataskema)
    {
        $dataskema->delete();

        return redirect()
            ->route('dataskema.index')
            ->with('success', 'Skema sertifikasi berhasil dihapus.');
    }
}
