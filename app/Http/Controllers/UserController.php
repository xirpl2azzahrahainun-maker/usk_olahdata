<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan daftar semua user
 public function index()
{

    $users = User::paginate(10);
    return view('user.index', compact('users'));
}

    // Menampilkan form tambah user
   public function create()
{

    $skemas = Skema::all();
    return view('user.create', compact('skemas'));
}

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,user',
        ]);

        User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan.');
    }

    // Menampilkan detail user tertentu
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // Memperbarui data user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:admin,user',
        ]);


        $data = [
            'username' => $request->username,
            'email'    => $request->email,
            'role'     => $request->role,
        ];


        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6']);
            $data['password'] = Hash::make($request->password);
        }



        $user->update($data);

         //mengupdate nama dan email dari user , jadi user di update data peseryta ikut ke update
        Peserta::where('user_id', $user->id)->update([
            'nama'  => $request->username,
            'email' => $request->email,
        ]);


        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
    }

    // Menghapus user
    public function destroy(User $user)

    {
        //ngambil user_id dan hapus user ini berdasarkan id nya 
      Peserta::where('user_id', $user->id)->delete();
        $user->delete();


        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }
}
