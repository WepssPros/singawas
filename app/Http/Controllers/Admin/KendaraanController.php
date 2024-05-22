<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kendaraans = Kendaraan::all();
        return view('pages.admin.kendaraan.index', compact('kendaraans'));
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

    public function verify($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->verified = true;
        $kendaraan->save();

        return redirect()->route('dashboard.verified.index')->with('success', 'Kendaraan berhasil diverifikasi.');
    }

    public function unverify($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->verified = false;
        $kendaraan->save();

        return redirect()->route('dashboard.verified.index')->with('success', 'Kendaraan berhasil dibatalkan verifikasinya.');
    }
}
