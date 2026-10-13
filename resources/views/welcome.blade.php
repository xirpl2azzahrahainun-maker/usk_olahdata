<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji Kompetensi Keahlian - RPL</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-color {
            background: linear-gradient(120deg, #235347, #163B32, #0B2B26, #051F20);
        }
        .btn-color {
            background: linear-gradient(120deg, #502d0a, #a36b31);
            border: none;
            color: #ffffff;
        }
        .btn-color:hover {
            background: linear-gradient(120deg, #3d2107, #8c5a28);
            color: #ffffff;
        }
        .color-custom{
            #235347

        }
    </style>
</head>
<body class="custom-color text-white min-vh-100 d-flex flex-column justify-content-between">

    <!-- NAVBAR: Tombol Login & Register di Pojok Kanan Atas -->
    <nav class="navbar navbar-dark px-4 py-3">
        <span class="navbar-brand fw-bold">Lembaga Sertifikasi Profesional Indonesia</span>
        <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm px-3 rounded-pill">Login</a>
            <a href="{{ route('register') }}" class="btn btn-color btn-sm px-3 rounded-pill">Register</a>
        </div>
    </nav>

   
    <main class="container text-center my-auto py-5">
    <h1 class="fw-bold mb-3 text-white ">Lembaga Sertifikasi Profesional</h1>
    <p class="text-white-50 col-md-6 mx-auto mb-4">
        Selamat datang di aplikasi pengolahan data peserta sertifikasi. Aplikasi ini memudahkan pengelolaan data peserta dan skema sertifikasi secara efisien dan aman.
    </p>
    
    <div class="row justify-content-center g-4 mt-3">
    
    <!-- Kartu 1: Terpercaya -->
    <div class="col-md-4">
        <div class="card border-0 text-dark capsule-card-white py-3 px-4 h-100 shadow-sm text-center">
            <h6 class="fw-bold mb-1 text-dark">Terpercaya</h6>
            <p class="text-muted small mb-0">Keamanan data & akun terjamin.</p>
        </div>
    </div>

    <!-- Kartu 2: Terstruktur -->
    <div class="col-md-4">
        <div class="card border-0 text-dark capsule-card-white py-3 px-4 h-100 shadow-sm text-center">
            <h6 class="fw-bold mb-1 text-dark">Terstruktur</h6>
            <p class="text-muted small mb-0">Pengelolaan skema & peserta rapi.</p>
        </div>
    </div>

    <!-- Kartu 3: Efisien -->
    <div class="col-md-4">
        <div class="card border-0 text-dark capsule-card-white py-3 px-4 h-100 shadow-sm text-center">
            <h6 class="fw-bold mb-1 text-dark">Efisien</h6>
            <p class="text-muted small mb-0">Proses administrasi cepat & transparan.</p>
        </div>
    </div>

</div>

    <!-- FOOTER -->
    <footer class="text-center py-3 text-white-50 small">
        &copy; {{ date('Y') }} USK RPL SMK
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>