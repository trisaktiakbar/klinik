<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        if (request()->filled('q')) {
            $data['daftars'] = Daftar::search(request('q'))->latest()->paginate(10);
        } else {
            $data['daftars'] = Daftar::latest()->paginate(10);
        }
        return view('daftar.index', $data);
    }

    public function create()
    {
        $data['list_pasien'] = Pasien::orderBy('nama')->get();
        $data['list_poli'] = Poli::orderBy('nama')->get();

        return view('daftar.create', $data);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'pasien' => 'required',
            'poli' => 'required',
            'keluhan' => 'required',
        ]);

        $requestData['pasien_id'] = $requestData['pasien'];
        $requestData['poli_id'] = $requestData['poli'];

        unset($requestData['pasien'], $requestData['poli']);

        $poli = Poli::findOrFail($requestData['poli_id']);
        $requestData['biaya'] = $poli->biaya;

        $daftar = new Daftar();
        $daftar->fill($requestData);
        $daftar->save();
        flash('Data berhasil ditambahkan')->success();
        return back();
    }

    public function show(string $id)
    {
        $data['daftar'] = Daftar::findOrFail($id);
        return view('daftar.show', $data);
    }

    public function edit(string $id)
    {
        $data['daftar'] = Daftar::findOrFail($id);

        $data['list_pasien'] = Pasien::orderBy('nama')->get();
        $data['list_poli'] = Poli::orderBy('nama')->get();

        return view('daftar.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required',
            'pasien' => 'required',
            'poli' => 'required',
            'keluhan' => 'required',
        ]);

        $requestData['pasien_id'] = $requestData['pasien'];
        $requestData['poli_id'] = $requestData['poli'];

        unset($requestData['pasien'], $requestData['poli']);

        $daftar = Daftar::findOrFail($id);

        $daftar->fill($requestData);

        $daftar->save();
        flash('Data berhasil diubah')->success();
        return redirect('/daftar');
    }

    public function updateDiagnosa(Request $request, string $id)
    {
        $requestData = $request->validate([
            'diagnosis' => 'required',
            'tindakan' => 'required',
        ]);

        $daftar = Daftar::findOrFail($id);

        $daftar->fill($requestData);

        $daftar->save();
        flash('Data berhasil diperbarui')->success();
        return back();
    }

    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
