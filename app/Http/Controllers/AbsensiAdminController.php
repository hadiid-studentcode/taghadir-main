<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiAdminController extends Controller
{
    public function index()
    {
        $absensi = Absensi::all();
        return view('admin.absensi.index', compact('absensi'));
    }

   
}
