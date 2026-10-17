<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Poli;
use Illuminate\Http\Request;

class LaporanDaftarController extends Controller
{
    public function create()
    {
        $data['polis'] = Poli::get();

        return view('laporan-daftar.create', $data);
    }

    public function index(Request $request)
    {
        $daftars = Daftar::query();
        if ($request->filled('tanggal_mulai')) {
            $daftars->whereDate('tanggal_daftar', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_akhir')) {
            $daftars->whereDate('tanggal_daftar', '<=', $request->tanggal_akhir);
        }
        if ($request->filled('poli')) {
            $daftars->where('poli_id', $request->poli);
        }

        $data['daftars'] = $daftars->latest()->get();

        return view('laporan-daftar.index', $data);
    }
}
