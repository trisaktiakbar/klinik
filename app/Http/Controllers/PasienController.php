<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasiens'] = Pasien::latest()->paginate(10);
        return view('pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => ['required'],
            'no_pasien' => ['required'],
            'umur' => ['required', 'numeric'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['nullable'],
            'foto' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:5120'],
        ]);

        $pasien = new Pasien;
        $pasien->fill($requestData);

        $pasien->foto = $request->file('foto')->store('public/pasien');

        $pasien->save();
        flash('Data berhasil ditambahkan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = Pasien::findOrFail($id);
        return view('pasien.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => ['required'],
            'no_pasien' => ['required', 'unique:pasiens,no_pasien,' . $id],
            'umur' => ['required', 'numeric'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['nullable'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:5120'],
        ]);

        $pasien = Pasien::findOrFail($id);
        $old_photo = $pasien->foto;
        $pasien->fill($requestData);

        if ($request->hasFile('foto')) {
            if ($old_photo && Storage::exists($old_photo)) {
                Storage::delete($old_photo);
            }
            $pasien->foto = $request->file('foto')->store('public/pasien');
        }

        $pasien->save();
        flash('Data berhasil diubah')->success();
        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            flash('Oops... Data tidak bisa dihapus karena terkait dengan data pendaftaran...')->error();
            return back();
        }

        if ($pasien->foto && Storage::exists($pasien->foto)) {
            Storage::delete($pasien->foto);
        }

        $pasien->delete();
        flash('Data berhasil dihapus')->success();

        return back();
    }
}
