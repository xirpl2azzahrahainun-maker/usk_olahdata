<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('peserta.Datapeserta', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.createpeserta', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'nik'      => 'required|unique:pesertas,nik',
            'email'    => 'required|email',
            'telepon'  => 'required',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        Peserta::create($request->all());

        return redirect()->route('peserta.Datapeserta')->with('success', 'Data peserta berhasil ditambahkan.');
    }

    public function show(Peserta $peserta)
    {
        $peserta->load('skema');
        return view('peserta.showpeserta', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();
        return view('peserta.editpeserta', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'nama'     => 'required',
            'nik'      => 'required|unique:pesertas,nik,' . $peserta->id,
            'email'    => 'required|email',
            'telepon'  => 'required',
            'skema_id' => 'required|exists:skemas,id',
        ]);

        $peserta->update($request->all());

        return redirect()->route('peserta.Datapeserta')->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();

        return redirect()->route('peserta.Datapeserta')->with('success', 'Data peserta berhasil dihapus.');
    }
}