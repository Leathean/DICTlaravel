<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
public function login(Request $request)
{
$credentials = $request->validate([
    'email' => 'required|email',
    'password' => 'required',
]);

if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->route('dashboard');
}

return back()->withErrors([
    'email' => 'The provided credentials do not match our records.',
]);
}
public function register(Request $request)
{
$request->validate([
    'name' => 'required|max:255',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|confirmed|min:8',
]);
$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password)
]);

// Auth::login($user);
return redirect()->route('dashboard');

}
public function logout(Request $request)
{
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect()->route('login');
}

}

