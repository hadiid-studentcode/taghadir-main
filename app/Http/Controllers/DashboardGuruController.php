<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Guru;
use App\Models\KelolaAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DashboardGuruController extends Controller
{
    public function index()
    {
        $id_users  = Auth::user()->id;
        $guru = Guru::where('user_id', $id_users)->first();
        $id_guru = $guru->id;
        $kelolaAbsensi = KelolaAbsensi::latest()->first();


        // waktu hari ini
        date_default_timezone_set('Asia/Jakarta');
        $tanggalHariIni = date('Y-m-d');
        $waktuHariIni = date('H:i:s');

        // Cek apakah ada data absensi terbaru
        if ($kelolaAbsensi) {
            // waktu absensi terbaru
            $tanggalAbsensiTerbaru = $kelolaAbsensi->tanggal;
            $waktu_bukaAbsensiTerbaru = $kelolaAbsensi->waktu_masuk;
            $waktu_tutupAbsensiTerbaru = $kelolaAbsensi->waktu_keluar;
        } else {
            // Jika tidak ada data absensi terbaru
            $tanggalAbsensiTerbaru = null;
            $waktu_bukaAbsensiTerbaru = null;
            $waktu_tutupAbsensiTerbaru = null;
        }

        $bulanHariIni_info = Carbon::now()->locale('id')->translatedFormat('F Y');
        $tanggalHariIni_info = Carbon::now()->locale('id')->translatedFormat('d F Y'); 

        $absensiHariIni = Absensi::where('date', $tanggalHariIni)->where('guru_id', $id_guru)->get();
       


        return view('guru.dashboard.index', compact('id_guru', 'kelolaAbsensi', 'tanggalHariIni', 'waktuHariIni', 'tanggalAbsensiTerbaru', 'waktu_bukaAbsensiTerbaru', 'waktu_tutupAbsensiTerbaru', 'bulanHariIni_info', 'tanggalHariIni_info', 'absensiHariIni'));
    }
}
