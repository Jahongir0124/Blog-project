<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    public function login(Request $request)
    {   
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function authenticate(Request $request)
    {

       
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Invalid Password'
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
    public function register_user(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['role_id'] = 2;
        $user = User::create($validated);
        auth()->login($user);
        return redirect('/');

    }
    
}
