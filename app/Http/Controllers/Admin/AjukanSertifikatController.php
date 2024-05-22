<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AjukanSertifikat;
use Illuminate\Http\Request;

class AjukanSertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = AjukanSertifikat::all();
        return view('pages.admin.pengajuan.index', compact('pengajuans'));
    }

    public function accept($id)
    {
        $pengajuan = AjukanSertifikat::findOrFail($id);
        $pengajuan->status = "Di Terima";
        $pengajuan->save();

        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Pengajuan berhasil diverifikasi.');
    }

    public function unaccept($id)
    {
        $pengajuan = AjukanSertifikat::findOrFail($id);
        $pengajuan->status = "Sedang Di Tinjau";
        $pengajuan->save();

        return redirect()->route('dashboard.pengajuan.index')->with('success', 'Kendaraan berhasil dibatalkan verifikasinya.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
