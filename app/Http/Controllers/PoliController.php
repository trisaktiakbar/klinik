<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $data['polis'] = Poli::latest()->paginate(10);
        return view('poli.index', $data);
    }

    public function create()
    {
        return view('poli.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => ['required'],
            'biaya' => ['required', 'numeric', 'min:0'],
            'keterangan' => ['nullable']
        ]);

        $poli = new Poli;
        $poli->fill($requestData);

        $poli->save();

        flash('Data berhasil ditambahkan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['poli'] = Poli::findOrFail($id);
        return view('poli.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => ['required'],
            'biaya' => ['required', 'numeric', 'min:0'],
            'keterangan' => ['nullable']
        ]);

        $poli = Poli::findOrFail($id);

        $poli->fill($requestData);

        $poli->save();
        flash('Data berhasil diubah')->success();
        return redirect('/poli');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = Poli::findOrFail($id);

        if ($poli->daftar->count() >= 1) {
            flash('Oops... Data tidak bisa dihapus karena terkait dengan data pendaftaran...')->error();
            return back();
        }

        $poli->delete();
        flash('Data berhasil dihapus')->success();

        return back();
    }
}
