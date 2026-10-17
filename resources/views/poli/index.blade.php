@extends('layouts.app_modern', ['title' => 'Data Poli'])
@section('content')
    <div class="card">
        <div class="card-header">Data Poli</div>
        <div class="card-body">

            <a href="/poli/create" class="btn btn-primary">Tambah Data</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Poli</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($polis as $poli)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $poli->nama }}</td>
                            <td>{{ $poli->biaya }}</td>
                            <td>{{ $poli->keterangan }}</td>
                            <td>
                                <a href="/poli/{{ $poli->id }}/edit" class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="/poli/{{ $poli->id }}" method="post" class="d-inline">
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

            {!! $polis->links() !!}
        </div>
    </div>
@endsection
