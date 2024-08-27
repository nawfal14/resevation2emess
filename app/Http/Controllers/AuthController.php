<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            Log::info('User logged in: ', ['user' => $user]);
    
            if ($user->is_admin) {
                return redirect()->route('admin');
            }
    
            return redirect()->route('dashboard');
        }
    
        return back()->withErrors([
            'login' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }
    

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);
    
        $user = User::create([
            'email' => $request->email,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'is_admin' => $request->has('is_admin') ? $request->input('is_admin') : false,
        ]);
    
        Auth::login($user);
    
        return redirect('/dashboard');
    }    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
