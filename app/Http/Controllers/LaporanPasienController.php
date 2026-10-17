<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    public function create()
    {
        return view('laporan-pasien.create');
    }

    public function index(Request $request)
    {
        $pasiens = Pasien::query();
        if ($request->filled('tanggal_mulai')) {
            $pasiens->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_akhir')) {
            $pasiens->whereDate('created_at', '<=', $request->tanggal_akhir);
        }
        if ($request->filled('tanggal_akhir')) {
            $pasiens->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $data['pasiens'] = $pasiens->latest()->get();

        return view('laporan-pasien.index', $data);
    }
}
