<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\KelolaAbsensi;
use Illuminate\Http\Request;

class AbsensiGuruController extends Controller
{
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $idGuru = $request->idGuru;
        $tanggal = date('Y-m-d');
        // $waktu = date('H:i:s');
        $waktu = "20:25:00";


        // Ambil pengaturan absensi pada tanggal tersebut
        $kelolaAbsensi = KelolaAbsensi::where('tanggal', $tanggal)->first();

        if (!$kelolaAbsensi) {
            return response()->json(['message' => 'Pengaturan absensi tidak ditemukan untuk hari ini.']);
        }

        $waktuBukaAbsen = $kelolaAbsensi->waktu_masuk;
        $waktuTutupAbsen = $kelolaAbsensi->waktu_keluar;
        $waktuMulaiAbsenPulang = date('H:i:s', strtotime($waktuTutupAbsen . ' -1 hour'));

        // Cek apakah sudah waktunya untuk absen masuk
        if ($waktu < $waktuBukaAbsen) {
            return response()->json(['message' => 'Waktu absensi belum dibuka.']);
        }

        // Cek apakah sudah ada data absensi untuk guru pada tanggal ini
        $absensi = Absensi::where('guru_id', $idGuru)
            ->where('date', $tanggal)
            ->first();

        if ($absensi) {
            // Jika sudah absen masuk, cek apakah sudah waktunya absen pulang
            if ($waktu >= $waktuMulaiAbsenPulang) {
                // Jika belum absen pulang, update dengan waktu pulang
                if (is_null($absensi->waktu_keluar)) {
                    $absensi->update([
                        'waktu_keluar' => $waktu,
                        'poin' => $absensi->poin + 50 // Tambah poin untuk absen pulang
                    ]);
                    return response()->json(['message' => 'Absen Pulang Berhasil']);
                } else {
                    return response()->json(['message' => 'Anda Sudah Absen Pulang']);
                }
            } else {
                return response()->json(['message' => 'Belum waktunya untuk absen pulang.']);
            }
        } else {
            // Jika belum absen masuk, cek apakah masih dalam waktu buka absensi
            if ($waktu <= $waktuTutupAbsen) {
                $data = [
                    'guru_id' => $idGuru,
                    'date' => $tanggal,
                    'waktu_masuk' => $waktu,
                    'waktu_keluar' => null,
                    'status' => 'Hadir',
                    'poin' => 100 // Poin untuk absen masuk
                ];

                Absensi::create($data);

                return response()->json(['message' => 'Absen Masuk Berhasil']);
            } else {
                return response()->json(['message' => 'Waktu absensi sudah ditutup.']);
            }
        }
    }
}
