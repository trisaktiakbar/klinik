@extends('layouts.blank')
@section('content')
    <div class="text-center">
        <h3>Laporan Data Pendaftaran</h3>
        <p>Laporan Tanggal {{ request('tanggal_mulai') ?: '-' }} sampai {{ request('tanggal_akhir') ?: '-' }}</p>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Pasien</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Daftar</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftars as $daftar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $daftar->pasien->no_pasien }}</td>
                    <td>{{ $daftar->pasien->nama }}</td>
                    <td>{{ $daftar->pasien->umur }}</td>
                    <td>{{ $daftar->pasien->jenis_kelamin }}</td>
                    <td>{{ $daftar->tanggal_daftar }}</td>
                    <td>{{ $daftar->poli->nama }}</td>
                    <td>{{ $daftar->biaya }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7">Total</th>
                <th>{{ $daftars->sum('biaya') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
