@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-header">Data Pasien</div>
        <div class="card-body">

            <a href="/pasien/create" class="btn btn-primary">Tambah Data</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Pasien</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pasien->no_pasien }}</td>
                            <td>
                                @if ($pasien->foto)
                                    <a href="{{ Storage::url($pasien->foto) }}" target="blank">
                                        <img src="{{ Storage::url($pasien->foto) }}" width="50">
                                    </a>
                                @endif
                                {{ $pasien->nama }}
                            </td>
                            <td>{{ $pasien->umur }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->created_at }}</td>
                            <td>
                                <a href="/pasien/{{ $pasien->id }}/edit"
                                    class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="/pasien/{{ $pasien->id }}" method="post" class="d-inline">
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

            {!! $pasiens->links() !!}
        </div>
    </div>
@endsection
