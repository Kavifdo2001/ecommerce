<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request){
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|string',
            'address' => 'required',
            'contact' => 'required',
        ]);

        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'type' =>'user',
            'email' => $request->email,
            'address' => $request->address,
            'contact' => $request->contact,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->type === 'admin'){
                return redirect()->route('admin.home')->with('success', 'You are logged in');
            }elseif ($user->type === 'user'){
                return redirect()->route('user.index')->with('success', 'You are logged in');
            }

        }
        return back()->with('error', 'Invalid credentials, please try again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}
