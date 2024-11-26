<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('guru.settings.index');
    }

    public function updatePassword(Request $request, $id){
        try {
            $request->validate([
                'new_password' => 'required|string',
                'confirm_password' => 'required|string',
            ]);

            if ($request->new_password != $request->confirm_password) {
                return back()->with('error', 'Password dan konfirmasi password tidak cocok');
            }

            User::where('id', $id)->update([
                'password' => bcrypt($request->new_password)
            ]);

          
    
            return back()->with('success', 'Data Akun Berhasil di ubah');

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Data guru gagal di ubah');
        }
    }

}
