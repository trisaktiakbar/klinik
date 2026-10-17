@extends('layouts.app_modern', ['title' => 'Tambah Data Pasien'])

@section('content')
    <div class="card">
        <div class="card-header">Tambah Data Pasien</div>
        <div class="card-body">

            <form action="/pasien" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                        id="foto">
                    @error('foto')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="no_pasien">No. Pasien</label>
                    <input type="number" class="form-control @error('no_pasien') is-invalid @enderror" name="no_pasien"
                        id="no_pasien" value="{{ old('no_pasien') }}">
                    @error('no_pasien')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control @error('umur') is-invalid @enderror" name="umur"
                        id="umur" value="{{ old('umur') }}">
                    @error('umur')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki_laki"
                                value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'checked' : '' }}>
                            <label for="laki_laki" class="form-check-label">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan"
                                value="perempuan" {{ old('jenis_kelamin') === 'perempuan' ? 'checked' : '' }}>
                            <label for="perempuan" class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <span class="form-text text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                        id="alamat" value="{{ old('alamat') }}">
                    @error('alamat')
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
