@extends('layouts.app_modern', ['title' => 'Pendaftaran Pasien'])

@section('content')
    <div class="card">
        <div class="card-header">
            Form Pendaftaran Pasien
        </div>
        <div class="card-body">
            <form action="/daftar" method="post">
                @csrf

                <div class="form-group mt-3">
                    <label for="tanggal_daftar">Tanggal Daftar</label>
                    <input type="date" id="tanggal_daftar" name="tanggal_daftar" class="form-control"
                        value="{{ old('tanggal_daftar') ?? date('Y-m-d') }}">
                    <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
                </div>


                <div class="form-group mt-3">
                    <label for="pasien">Pasien</label>
                    <select name="pasien" id="pasien" class="select2 form-control">
                        <option value="">-- Pilih Pasien --</option>
                        @foreach ($list_pasien as $pasien)
                            <option value="{{ $pasien->id }}" @selected(old('pasien') == $pasien->id)>
                                {{ $pasien->no_pasien }} - {{ $pasien->nama }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('pasien') }}</span>
                </div>

                <div class="form-group mt-3">
                    <label for="poli">Poli</label>
                    <select name="poli" id="poli" class="select2 form-control">
                        <option value="">-- Pilih Poli --</option>
                        @foreach ($list_poli as $poli)
                            <option value="{{ $poli->id }}" @selected(old('poli') == $poli->id)>
                                {{ $poli->nama }} - {{ $poli->biaya }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('poli') }}</span>
                </div>

                <div class="form-group mt-3 mb-3">
                    <label for="keluhan">Keluhan</label>
                    <textarea id="keluhan" name="keluhan" rows="3" class="form-control">{{ old('keluhan') }}</textarea>
                    <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    </div>
@endsection
