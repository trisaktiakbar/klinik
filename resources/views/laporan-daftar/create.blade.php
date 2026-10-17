@extends('layouts.app_modern')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Data Pendaftaran</div>
                    <div class="card-body">
                        <form action="/laporan-daftar" method="get" target="_blank">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Daftar Mulai</label>
                                        <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal_akhir">Tanggal Daftar Akhir</label>
                                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="poli">Poli</label>
                                        <select name="poli" id="poli" class="form-control">
                                            <option value="">-- Semua Poli --</option>
                                            @foreach ($polis as $poli)
                                                <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
