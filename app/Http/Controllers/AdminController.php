<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('admin.home.homeView');
    }

    public function adminIndex()
    {
        $admin = User::where('type','admin')->get();
        return view('admin.settings.adminIndex' , compact('admin'));
    }

    public function createAdmin(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $password = $request->password;
        $confirmPw = $request->password_confirmation;

        if ($password !== $confirmPw) {
            return back()->with('error', 'Passwords do not match');
        } else {
            $encryptedPassword = Hash::make($password);

            User::create([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'type' => 'admin',
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => $encryptedPassword,
            ]);

            return back()->with('success', 'Admin created successfully');
        }
    }

    public function editAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('admin.settings.adminEdit', compact('user'));
    }

    public function updateAdmin(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
        ]);

       $user->update([
           'f_name' => $request->f_name,
           'l_name' => $request->l_name,
           'email'=> $request->email,
           'contact' => $request->contact,
       ]);

        return back()->with('success', 'Admin updated successfully');
    }

    public function deleteAdmin($id){

        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Admin deleted successfully');
    }

}
