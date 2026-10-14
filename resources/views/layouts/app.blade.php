<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta Sertifikasi</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .custom-color{
            Background: linear-gradient(120deg, #235347 , #163B32 , #0B2B26, #051F20);
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .custom-navbar {
            background: linear-gradient(120deg, #235347 , #163B32 , #0B2B26,#051F20);
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .color {
            color: white;
        }

        .hero-banner {
            margin-top: 20px;
            background: linear-gradient(135deg, #00E7FF, #000B75, #04044A, #000B75);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
            padding: 60px 0;
            margin-bottom: 30px;
            width: 100%;
        }
    </style>
</head>
<body class="bg-light">

    <!-- 1. Navbar -->
    <nav class="shadow-sm navbar navbar-expand-lg custom-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold color text-light" href="{{ route('dashboard') }}">Akses Data Peserta Sertifikasi</a>
           <div class="d-flex align-items-center gap-3 margin-right: 20px;">
                <a href="{{ route('dashboard') }}" class="text-light text-decoration-none" >Beranda</a>
                <a href="{{ route('peserta.index') }}" class="text-light text-decoration-none">Data Peserta</a>
                <a href="{{ route('dataskema.index') }}" class="text-light text-decoration-none">Data Skema</a>

                @if(auth()->user()->role === 'admin')
                <a href="{{ route('user.index') }}" class="nav-link text-light">Data Pendaftar</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="cursor: pointer; margin-left: 30px; ">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- 2. Main Content -->
    <main class="flex-fill">
        @yield('content')
    </main>

    <!-- 3. Footer -->
    <footer class="py-4 mt-auto text-white custom-color" >
        <div class="container">
            <div class="row gy-3 align-items-center">
                <!-- Brand & Deskripsi -->
                <div class="text-center col-md-6 text-md-start">
                    <h6 class="mb-1 fw-bold text-light">Data Peserta Sertifikasi</h6>
                    <small class="text-white-50">kembangkan potensi anak bangsa</small>
                </div>

                <!-- Hak Cipta -->
                <div class="text-center col-md-6 text-md-end">
                    <small class="text-white-50"> {{ date('Y') }} All rights reserved.</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS & Script Stack -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
