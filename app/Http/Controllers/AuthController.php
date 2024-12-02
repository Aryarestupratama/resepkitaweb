<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegisterForm()
        {
            return view('auth.register');
        }

    public function register(Request $request)
        {
            $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'phone_number' => 'required|string|max:15',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        }

    public function showLoginForm()
        {
            return view('auth.login');
        }

    public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Ambil role user yang login
                $userRole = Auth::user()->role;

                // Redirect berdasarkan role
                if ($userRole === 'admin') {
                    return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai Admin.');
                } elseif ($userRole === 'user') {
                    return redirect()->route('dashboard')->with('success', 'Login berhasil sebagai User.');
                }

                // Jika role tidak dikenali (opsional)
                Auth::logout();
                return redirect()->route('login')->with('error', 'Role tidak dikenali.');
            }

            // Jika login gagal
            throw ValidationException::withMessages([
                'email' => 'Email atau password salah.',
            ]);
        }

    public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('success', 'Logout berhasil.');
        }

    public function show($id)
        {
            $user = User::findOrFail($id);
            $resep = $user->resep()->get(); // Mengambil resep yang dibuat oleh user

            return view('admin.user.show', compact('user', 'resep'));
        }
}
