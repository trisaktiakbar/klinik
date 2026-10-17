@extends('layouts.app_modern', ['title' => 'Edit Data Poli'])

@section('content')
    <div class="card">
        <div class="card-header">Edit Data Poli</div>
        <div class="card-body">
            <form action="/poli/{{ $poli->id }}" method="post">
                @method('put')
                @csrf

                <div class="form-group mb-3">
                    <label for="nama">Nama Poli</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        id="nama" value="{{ old('nama', $poli->nama) }}">
                    @error('nama')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="biaya">Biaya</label>
                    <input type="number" class="form-control @error('biaya') is-invalid @enderror" name="biaya"
                        id="biaya" value="{{ old('biaya', $poli->biaya) }}">
                    @error('biaya')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                        id="keterangan" value="{{ old('keterangan', $poli->keterangan) }}">
                    @error('keterangan')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
