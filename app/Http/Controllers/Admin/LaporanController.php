<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inspeksi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporankendaraan()
    {
        $kendaraans = Kendaraan::all();
        return view('pages.admin.laporan.kendaraan', compact('kendaraans'));
    }

    public function laporaninspeksi()
    {
        $inspeksis = Inspeksi::all();
        return view('pages.admin.laporan.inspeksi', compact('inspeksis'));
    }
}
