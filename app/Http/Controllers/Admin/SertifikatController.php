<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inspeksi;
use App\Models\Inspektor;
use App\Models\Kendaraan;
use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sertifikats = Sertifikat::all();
        return view('pages.admin.sertifikat.index', compact('sertifikats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kendaraans = Kendaraan::all();
        $inspektors = Inspektor::all();
        $inspeksis =  Inspeksi::all();

        return view('pages.admin.sertifikat.create', compact('kendaraans', 'inspektors', 'inspeksis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'inspektor_id' => 'required|exists:inspektors,id',
            'inspeksi_id' => 'required|exists:inspeksis,id',
            'sertifikat_number' => 'required|string|unique:sertifikats,sertifikat_number', // Validasi nomor sertifikat
            'valid_from_date' => 'required|date',
            'valid_until_date' => 'required|date|after:valid_from_date',
            'issued_by' => 'required|string',
            'verified' => 'required|boolean',
        ]);

        // Simpan data sertifikat
        Sertifikat::create([
            'kendaraan_id' => $request->kendaraan_id,
            'inspektor_id' => $request->inspektor_id,
            'inspeksi_id' => $request->inspeksi_id,
            'sertifikat_number' => $request->sertifikat_number,
            'valid_from_date' => $request->valid_from_date,
            'valid_until_date' => $request->valid_until_date,
            'issued_by' => $request->issued_by,
            'verified' => $request->has('verified') ? true : false,
        ]);

        return redirect()->route('dashboard.sertifikat.index')->with('success', 'Sertifikat berhasil ditambahkan.');
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
