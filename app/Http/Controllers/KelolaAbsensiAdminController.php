<?php

namespace App\Http\Controllers;

use App\Models\KelolaAbsensi;
use Illuminate\Http\Request;

class KelolaAbsensiAdminController extends Controller
{
    public function index()
    {
        $kelolaAbsensi = KelolaAbsensi::all();
        return view('admin.kelola-absensi.index', compact('kelolaAbsensi'));
    }

    public function store(Request $request)
    {
        try {
            $kelolaAbsensi = new KelolaAbsensi();
            $kelolaAbsensi->create([
                'tanggal' => $request->tanggal,
                'waktu_masuk' => $request->waktu_masuk,
                'waktu_keluar' => $request->waktu_keluar
            ]);
            return back()->with('success', 'Data Kelola absensi berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data Kelola absensi gagal ditambahkan');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            // Mencari record berdasarkan ID
            $kelolaAbsensi = KelolaAbsensi::findOrFail($id);

            // Mengupdate data yang ditemukan
            $kelolaAbsensi->update([
                'tanggal' => $request->tanggal,
                'waktu_masuk' => $request->waktu_masuk,
                'waktu_keluar' => $request->waktu_keluar
            ]);

            return back()->with('success', 'Data Kelola absensi berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data Kelola absensi gagal diubah');
        }
    }


    public function destroy($id)
    {
        try {
            $kelolaAbsensi = KelolaAbsensi::find($id);
            $kelolaAbsensi->delete();
            return back()->with('success', 'Data Kelola absensi berhasil di hapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data Kelola absensi gagal di hapus');
        }
    }
}
