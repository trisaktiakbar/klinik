@extends('layouts.blank')

@section('content')
    <div class="container-fluid ">
        <div class="row justify-content-center align-items-center min-vh-100">
            {{-- Ilustrasi --}}
            <div class="col-md-6 d-none d-md-flex flex-column min-vh-100 justify-content-center p-5"
                style="background: #f3f7ff;">
                <a href="{{ url('/') }}" class="text-decoration-none text-dark fw-bold fs-3 mb-4">
                    <i class="ti ti-medical-cross text-primary"></i> Klinik
                </a>

                <img src="{{ asset('modern/src/assets/images/ilustrasi.png') }}" alt="Ilustrasi klinik" class="img-fluid mb-4">

                <h2 class="fw-bold">Kelola Layanan Klinik dengan Lebih Mudah</h2>
                <p class="text-primary">
                    Kelola data poli, pasien, pendaftaran, dan laporan dalam satu platform.
                </p>
            </div>

            {{-- Form Login --}}
            <div class="col-12 col-sm-6 d-flex justify-content-center text-center">
                <div class="w-100 text-center" style="max-width: 410px;">
                    <div class="d-lg-none text-primary fw-bold fs-3 mb-5">
                        <i class="ti ti-medical-cross"></i> Klinik
                    </div>

                    <div class="mb-4">
                        <span class="text-primary small fw-bold">SELAMAT DATANG KEMBALI</span>
                        <h2 class="fw-bold mt-2">Masuk ke Akun Anda</h2>
                        <p class="text-info">
                            Masukkan email dan password untuk melanjutkan.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">
                                Alamat Email
                            </label>

                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="ti ti-mail"></i>
                                </span>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="email"
                                    autofocus>
                            </div>

                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="ti ti-lock"></i>
                                </span>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Masukkan password" required autocomplete="current-password">
                                <button type="button" class="input-group-text bg-light" id="togglePassword"
                                    aria-label="Tampilkan password">
                                    <i class="ti ti-eye"></i>
                                </button>
                            </div>

                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 fw-semibold">
                            Masuk ke Dashboard
                            <i class="ti ti-arrow-right ms-1"></i>
                        </button>
                    </form>

                    <div class="text-center text-primary small mt-4">
                        <i class="ti ti-shield-check text-success"></i>
                        Akses khusus untuk pengguna yang berwenang.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword')?.addEventListener('click', function() {
            const password = document.getElementById('password');
            const visible = password.type === 'password';

            password.type = visible ? 'text' : 'password';
            this.innerHTML = visible ?
                '<i class="ti ti-eye-off"></i>' :
                '<i class="ti ti-eye"></i>';
            this.setAttribute(
                'aria-label',
                visible ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    </script>
@endsection
