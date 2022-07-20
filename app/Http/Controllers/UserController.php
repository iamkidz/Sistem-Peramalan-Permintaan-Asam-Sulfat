<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->no_hp = $request->no_hp;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Berhasil', 'User berhasil ditambahkan');
        return back();
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->no_hp = $request->no_hp;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        Alert::success('Berhasil', 'User berhasil diubah');
        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        Alert::success('Berhasil', 'User berhasil dihapus');
        return back();
    }

    public function login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::whereUsername($request->username)->first();

        if (!empty($user) && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();

            Auth::login($user);

            Alert::success('Login Berhasil', 'Selamat Datang');
            return redirect()->route('dashboard');
        } else {
            Alert::error('Gagal', 'Username atau Password Salah');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Sukses', 'Logout berhasil');
        return to_route('login');
    }

    public function register(UserRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->no_hp = $request->no_hp;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        Alert::success('Berhasil', 'User berhasil ditambahkan, silakan login');
        return back();
    }
}
