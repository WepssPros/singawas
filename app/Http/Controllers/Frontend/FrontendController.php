<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AjukanSertifikat;
use App\Models\Kendaraan;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        // Initialize $sertifikat variable
        $sertifikat = null;

        // Jika ada data pencarian, proses pencarian
        if ($request->has(['nopol', 'sertifikat_number', 'valid_from_date', 'valid_until_date'])) {
            // Validasi input
            $request->validate([
                'nopol' => 'required|string',
                'sertifikat_number' => 'required|string',
                'valid_from_date' => 'required|date',
                'valid_until_date' => 'required|date|after:valid_from_date'
            ]);

            // Query untuk mencari sertifikat berdasarkan input
            $sertifikat = Sertifikat::where('sertifikat_number', $request->input('sertifikat_number'))
                ->whereHas('kendaraan', function ($query) use ($request) {
                    $query->where('nopol', $request->input('nopol'));
                })
                ->where('valid_from_date', '<=', $request->input('valid_from_date'))
                ->where('valid_until_date', '>=', $request->input('valid_until_date'))
                ->first();
        }

        // Jika pencarian berhasil, kirim $sertifikat ke view
        if ($sertifikat) {
            return view('pages.frontend.index', compact('sertifikat'))->with('success', "Sertifikat ditemukan: {$sertifikat->sertifikat_number}");
        }

        // Jika pencarian tidak berhasil, kirim pesan gagal
        return view('pages.frontend.index')->with('danger', "Sertifikat tidak ditemukan atau masa berlaku tidak sesuai.");
    }


    public function daftarkendaraan()
    {
        return view('pages.frontend.daftar');
    }

    public function pengajuansertifikat()
    {
        return view('pages.frontend.pengajuan');
    }

    public function storekendaraan(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nopol' => 'required|string',
            'brand_kendaraan' => 'required|string',
            'type' => 'required|string',
            'tahun_pembuatan' => 'required|date',
            'nama_owner' => 'required|string',
            'alamat_owner' => 'required|string',
            'nomorhp_owner' => 'required|string',
        ]);

        // Generate nomor registrasi secara acak
        $nomorRegistrasi = $this->generateNomorRegistrasi();

        // Buat instance dari model DaftarKendaraan
        $daftarKendaraan = new Kendaraan([
            'users_id' => Auth::user()->id,
            'nomor_registrasi' => $nomorRegistrasi,
            'nopol' => $request->input('nopol'),
            'brand_kendaraan' => $request->input('brand_kendaraan'),
            'type' => $request->input('type'),
            'tahun_pembuatan' => $request->input('tahun_pembuatan'),
            'nama_owner' => $request->input('nama_owner'),
            'alamat_owner' => $request->input('alamat_owner'),
            'nomorhp_owner' => $request->input('nomorhp_owner'),
            'verified' => false, // Default value untuk verified adalah false
        ]);

        // Simpan data ke database
        $daftarKendaraan->save();

        // Kembalikan response atau redirect sesuai kebutuhan
        return redirect()->route('index')->with('success', "Data Kendaraan Telah  Dibuat.");
    }


    public function storesertifikat(Request $request)
    {
        // Custom error messages
        $messages = [
            'nomor_inspeksi.exists' => 'Nomor inspeksi tidak ada.',
            'nopol_terdaftar.exists' => 'Nomor salah.',
            'nomor_registrasi_kendaraan.exists' => 'Nomor registrasi tidak ada.',
        ];

        // Validate the request data with custom error messages
        $validatedData = $request->validate([

            'nomor_inspeksi' => 'required|string|max:255|exists:inspeksis,nomor_inspeksi',
            'nopol_terdaftar' => 'required|string|max:255|exists:kendaraans,nopol',
            'nomor_registrasi_kendaraan' => 'required|string|max:255|exists:kendaraans,nomor_registrasi',
        ], $messages);

        // Set default status if not provided
        $validatedData['status'] = $validatedData['status'] ?? 'Belum Di tinjau';
        $validatedData['user_id'] = Auth::user()->id;
        // Create a new certificate using the validated data
        $sertifikat = AjukanSertifikat::create($validatedData);

        // Redirect to a route, for example to a certificate listing page
        return redirect()->route('index')->with('success', 'Pengajuan Berhasil Dibuat Admin Akan Meninjau Pengajuan Anda!');
    }

    private function generateNomorRegistrasi()
    {
        $part1 = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $part2 = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $part3 = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        return "$part1 - $part2 - $part3";
    }
}
