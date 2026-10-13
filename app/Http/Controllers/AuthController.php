<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses login berdasarkan email dan password
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/dashboard')
                    ->with('success', 'Selamat datang, Admin!');
            }

            return redirect('/dashboard')
                ->with('success', 'Selamat datang!');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    // Menampilkan form register beserta pilihan skema
    public function showRegister()
    {
        $skemas = Skema::all();

        return view('auth.register', compact('skemas'));
    }

    // Memproses akun dan biodata peserta sekaligus
public function register(Request $request)
{
    $validated = $request->validate([
        'username' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:6'],
        'nama' => ['required', 'string', 'max:255'],
        'nik' => ['required', 'string', 'max:255'],
        'telepon' => ['required', 'string', 'max:20'],
        'skema_id' => ['required', Rule::exists('skemas', 'id')],
    ]);

    $user = DB::transaction(function () use ($validated) {

        // Cek apakah NIK sudah didaftarkan admin.
        $peserta = Peserta::where('nik', $validated['nik'])
            ->lockForUpdate()
            ->first();

        // Kalau sudah terhubung dengan akun, jangan gunakan lagi.
        if ($peserta && $peserta->user_id !== null) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'nik' => 'NIK ini sudah memiliki akun. Silakan login.',
            ]);
        }

        // Buat akun user baru.
        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        if ($peserta) {
            // Data sudah dimasukkan admin.
            // Hubungkan data lama ke akun baru.
            $peserta->update([
                'user_id' => $user->id,
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'],
                'skema_id' => $validated['skema_id'],
            ]);
        } else {
            // Belum ada data, buat data peserta baru.
            Peserta::create([
                'user_id' => $user->id,
                'nama' => $validated['nama'],
                'nik' => $validated['nik'],
                'email' => $validated['email'],
                'telepon' => $validated['telepon'],
                'skema_id' => $validated['skema_id'],
            ]);
        }

        return $user;
    });

    Auth::login($user);
    $request->session()->regenerate();

    return redirect('/dashboard')
        ->with('success', 'Registrasi berhasil!');
}



    // Logout dan mengakhiri sesi login
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
