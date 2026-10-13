
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
            min-height: 100vh;
            padding: 30px 15px;
        }

        .register-box {
            background: white;
            max-width: 700px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
        }


        .subtitle, .login-link {
            text-align: center;
            color: #64748b;
        }


        .form-control, .form-select {
            padding: 10px;
            border-radius: 6px;
        }

        

        .btn-register {
            width: 100%;
            padding: 12px;
            background: linear-gradient(120deg, #502d0a, #a36b31);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn-register:hover {
            background: linear-gradient(120deg, #235347, #163B32);
        }

        .login-link { margin-top: 20px; }
        .login-link a {
            color: #235347;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="register-box">
    <h2 class="text-center fw-bold font-black" >Daftar Akun Baru</h2>
    <p class="text-center mb-4 mt-2 font-light">Sistem Data Peserta Sertifikasi</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Registrasi gagal!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <h5 class="fw-bold font-bold mt-3 mb-3">A. Informasi Akun</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="username">Username</label>
                <input type="text" 
                id="username"
                name="username"
                class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username') }}" 
                placeholder="Username hanya huruf dan spasi" 
                required
                pattern="[a-zA-Z\s]+">
                @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" 
                id="email" 
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                 placeholder="Masukkan email" 
                 required>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" 
                id="password" 
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Minimal 6 karakter" 
                minlength="6" 
                required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <h5 class="fw-bold font-bold mt-3 mb-3">B. Biodata Peserta</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nama">Nama Lengkap</label>
                <input type="text"
                 id="nama" 
                 name="nama"
                class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}" 
                placeholder="Masukkan nama lengkap" 
                required>
                @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="nik">NIK</label>
                <input type="text"
                 id="nik" name="nik"
                class="form-control @error('nik') is-invalid @enderror"
                value="{{ old('nik') }}"
                 placeholder="Masukkan NIK"
                inputmode="numeric" 
                required>
                @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel"
                 id="telepon" 
                 name="telepon"
                class="form-control @error('telepon') is-invalid @enderror"
                value="{{ old('telepon') }}"
                 required>
                @error('telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="skema_id">Skema Sertifikasi</label>
                <select id="skema_id" name="skema_id"
                    class="form-select @error('skema_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Skema --</option>
                    @foreach ($skemas as $skema)
                        <option value="{{ $skema->id }}"
                            {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                            {{ $skema->nama_skema }}
                        </option>
                    @endforeach
                </select>
                @error('skema_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <button type="submit" class="btn-register mt-4">Daftar Sekarang</button>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
    </div>
</div>

</body>
</html>