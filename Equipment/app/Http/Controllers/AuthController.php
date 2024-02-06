<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
 
    public function registerAction(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        
        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role' => 'user',
        ]);
 
        return redirect()->route('login')->with('success','Successfully registered');
    }
 
    public function login()
    {
        return view('auth.login');
    }
 
    public function loginAction(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            if(auth()->user()->role == 'user'){
            return redirect('home');
            }
            elseif(auth()->user()->role == 'admin'){
            return redirect('adminhome');
            }
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::guard('web')->logout();

        session()->invalidate();
 
        return redirect()->route('login');
    }
}