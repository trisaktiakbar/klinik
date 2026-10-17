@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">DATA PENDAFTARAN {{ strtoupper($daftar->pasien?->nama) }}</div>
                    <div class="card-body">
                        <h4>Data Pasien</h4>

                        <table>
                            <tbody>
                                <tr>
                                    <th>No. Pasien</th>
                                    <th>:</th>
                                    <td>{{ $daftar->pasien?->no_pasien }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Pasien</th>
                                    <th>:</th>
                                    <td>{{ $daftar->pasien?->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th>:</th>
                                    <td>{{ $daftar->pasien?->jenis_kelamin }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h4>Riwayat Pasien</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosis</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar->pasien->daftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_daftar }}</td>
                                        <td>{{ $item->keluhan }}</td>
                                        <td>{{ $item->diagnosis }}</td>
                                        <td>{{ $item->tindakan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h4>Data Pendaftaran</h4>
                        <table>
                            <tbody>
                                <tr>
                                    <th>No. Pendaftaran</th>
                                    <th>:</th>
                                    <td>{{ $daftar->id }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Daftar</th>
                                    <th>:</th>
                                    <td>{{ $daftar->tanggal_daftar }}</td>
                                </tr>
                                <tr>
                                    <th>Poli</th>
                                    <th>:</th>
                                    <td>{{ $daftar->poli?->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Keluhan</th>
                                    <th>:</th>
                                    <td>{{ $daftar->keluhan }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pendaftaran</th>
                                    <th>:</th>
                                    <td>{{ $daftar->status_daftar }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <hr>
                        <h4>Hasil Diagnosis</h4>
                        <form action="/daftar/{{ $daftar->id }}/diagnosis-tindakan" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group mb-3">
                                <label for="diagnosis">Diagnosis</label>
                                <textarea name="diagnosis" id="diagnosis" rows="3" class="form-control">{{ old('diagnosis', $daftar->diagnosis) }}</textarea>
                                <span class="text-danger">{{ $errors->first('diagnosis') }}</span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tindakan">Tindakan</label>
                                <textarea name="tindakan" id="tindakan" rows="3" class="form-control">{{ old('tindakan', $daftar->tindakan) }}</textarea>
                                <span class="text-danger">{{ $errors->first('tindakan') }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
