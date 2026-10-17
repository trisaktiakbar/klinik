@extends('layouts.blank')
@section('content')
    <div class="text-center">
        <h3>Laporan Data Pasien</h3>
        <p>Laporan Tanggal {{ request('tanggal_mulai') ?: '-' }} sampai {{ request('tanggal_akhir') ?: '-' }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Pasien</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Buat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pasien->no_pasien }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->umur }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td>{{ $pasien->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
