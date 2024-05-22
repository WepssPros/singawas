<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inspektor;
use App\Models\User;
use Illuminate\Http\Request;

class InspektorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inspektors = Inspektor::all();
        return view('pages.admin.inspektor.index', compact('inspektors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('pages.admin.inspektor.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'foto_inspektor' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_inspektor' => 'required',
            'no_hp' => 'required',
            'posisi_jabatan' => 'required',
        ]);

        // Upload file
        if ($request->hasFile('foto_inspektor')) {
            $file = $request->file('foto_inspektor');
            $filename = $file->store('foto_inspektor', 'public');
        }

        // Save inspektor data
        Inspektor::create([
            'user_id' => auth()->id(),
            'foto_inspektor' => $filename,
            'nama_inspektor' => $request->nama_inspektor,
            'no_hp' => $request->no_hp,
            'posisi_jabatan' => $request->posisi_jabatan,
        ]);

        return redirect()->route('dashboard.inspektor.index')->with('success', 'Data inspektor berhasil ditambahkan');
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
