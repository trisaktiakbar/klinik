@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="card">
        <div class="card-header">Data Pendaftaran</div>
        <div class="card-body">
            <a href="/daftar/create" class="btn btn-primary mb-3">Tambah Data</a>

            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="q" class="form-control" placeholder="Masukkan kata kunci"
                        value="{{ request('q') }}">
                    <button type="submit" class="btn btn-outline-secondary">Cari</button>
                </div>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Poli</th>
                        <th>Keluhan</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftars as $daftar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $daftar->id }}</td>
                            <td>{{ $daftar->pasien->nama }}</td>
                            <td>{{ $daftar->pasien->jenis_kelamin }}</td>
                            <td>{{ $daftar->tanggal_daftar }}</td>
                            <td>{{ $daftar->poli?->nama ?: '-' }}</td>
                            <td>{{ $daftar->keluhan }}</td>
                            <td>{{ $daftar->biaya }}</td>
                            <td>
                                <a href="/daftar/{{ $daftar->id }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="/daftar/{{ $daftar->id }}/edit"
                                    class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="/daftar/{{ $daftar->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are your sure ?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $daftars->links() !!}
        </div>
    </div>
@endsection
