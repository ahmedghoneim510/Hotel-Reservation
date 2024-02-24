<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('dashboard.auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|confirmed'
        ]);
        $admin = \App\Models\Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        auth()->guard('admin')->login($admin);
        return redirect()->route('admin.dashboard');
    }
    public function loginView()
    {
        return view('dashboard.auth.login');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //dd($request->all());
        $credentials = $request->only('email', 'password');

        $remember_me = $request->has('remember_me') ? true : false;
        if (auth()->guard('admin')->attempt($credentials,$remember_me)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Invalid Credentials');
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('home');
    }
}
