<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(120deg, #235347 , #163B32 , #0B2B26, #051F20);
        }

        .register-box {
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 25px;
        }

        label {
            color: #334155;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background: linear-gradient(120deg,#502d0a ,#a36b31);
        }

        button:hover {
            background: linear-gradient(120deg,#0C97FA,#16E1F5);
        }

        .error {
            color: red;
            background: #fee2e2;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            color: #475569;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="register-box">

        <h2>Daftar Akun Baru</h2>

        @if ($errors->any())
    <div class="error">
        {{ $errors->first() }}
    </div>
@endif

        <form action="{{ route('register') }}" method="POST">

            @csrf

            <div>
                <label>Nama</label>

                <input type="text"
                       name="username"
                       value="{{ old('username') }}"
                       placeholder="Masukkan nama"
                       required>
            </div>

            <div style="margin-top: 15px;">
                <label>Email</label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email"
                       required>
            </div>

            <div style="margin-top: 15px;">
                <label>Password</label>

                <input type="password"
                       name="password"
                       placeholder="Minimal 4 karakter"
                       required>
            </div>

            <div style="margin-top: 20px;">
                <button type="submit">
                    Register
                </button>
            </div>

        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </div>

    </div>

</body>
</html>