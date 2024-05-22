<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inspeksi;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class InspeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inspeksis = Inspeksi::all();
        return view('pages.admin.inspeksi.index', compact('inspeksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kendaraans = Kendaraan::all();
        return view('pages.admin.inspeksi.create', compact('kendaraans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_inspeksi' => 'required|date',
            'hasil_inspeksi' => 'required|string',
            'bukti_foto1' => 'required|image|max:2048',
            'bukti_foto2' => 'required|image|max:2048',
            'bukti_foto3' => 'required|image|max:2048',
            'verified' => 'required',
        ]);

        $buktiFoto1Path = null;
        $buktiFoto2Path = null;
        $buktiFoto3Path = null;
        // Simpan foto-foto inspeksi
        if ($request->hasFile('bukti_foto1')) {
            $file1 = $request->file('bukti_foto1');
            $buktiFoto1Path = $file1->store('inspeksi_fotos', 'public');
        }

        if ($request->hasFile('bukti_foto2')) {
            $file2 = $request->file('bukti_foto2');
            $buktiFoto2Path = $file2->store('inspeksi_fotos', 'public');
        }

        if ($request->hasFile('bukti_foto3')) {
            $file3 = $request->file('bukti_foto3');
            $buktiFoto3Path = $file3->store('inspeksi_fotos', 'public');
        }
        $nomorInspeksi = mt_rand(100000000, 999999999);
        // Simpan data inspeksi
        Inspeksi::create([
            'nomor_inspeksi' => $nomorInspeksi,
            'kendaraan_id' => $request->kendaraan_id,
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'hasil_inspeksi' => $request->hasil_inspeksi,
            'bukti_foto1' => $buktiFoto1Path,
            'bukti_foto2' => $buktiFoto2Path,
            'bukti_foto3' => $buktiFoto3Path,
            'verified' => $request->verified,
        ]);

        // Redirect ke halaman tertentu atau kirimkan respons JSON jika menggunakan AJAX
        return redirect()->route('dashboard.inspeksi.index')->with('success', "Data Inspeksi Telah Dibuat.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
