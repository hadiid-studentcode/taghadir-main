<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class ManajemenGuruAdminController extends Controller
{
    public function index()
    {

        $guru = Guru::all();

        return view('admin.manajemen-guru.index')
            ->with('guru', $guru);
    }

    public function store(Request $request)
    {

        try {
            $nama_guru = $request->nama;
            $nip = $request->nip;
            $bidang_studo  = $request->studi;

            //    buat user guru
            User::create([
                'username' => $nip,
                'email' => null,
                'password' => bcrypt($nip),
                'role' => 'guru'
            ]);

            //    buat data guru
            Guru::create([
                'nama' => $nama_guru,
                'nip' => $nip,
                'bidang_studi' => $bidang_studo,
                'user_id' => User::where('username', $nip)->first()->id
            ]);

            return back()->with('success', 'Data guru berhasil ditambahkan');
        } catch (\Throwable $th) {
            return   back()->with('error', 'Data guru gagal ditambahkan');
        }
    }

    public function destroy($id)
    {
        try {
            $guru = Guru::find($id);
            $guru->delete();
            return back()->with('success', 'Data guru berhasil di hapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data guru gagal di hapus');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $guru = Guru::find($id);
            $guru->update([
                'bidang_studi' => $request->studi,
                'nama' => $request->nama,
                'nip' => $request->nip,
            ]);

            return  back()->with('success', 'Data guru berhasil di ubah');
        } catch (\Throwable $th) {
           return back()->with('error', 'Data guru gagal di ubah');
        }
    }
}
