<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KendaraansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['motor', 'mobil'];
        for ($i = 0; $i < 10; $i++) {
            DB::table('kendaraans')->insert([
                'users_id' => 1,
                'nomor_registrasi' => $this->generateRandomNumber(12),
                'nopol' => 'BH-' . rand(1000, 9999) . '-' . Str::upper(Str::random(2)),
                'brand_kendaraan' => 'Brand ' . $i,
                'type' => $types[array_rand($types)],
                'tahun_pembuatan' => now()->subYears(rand(1, 30))->toDateString(),
                'nama_owner' => 'Owner ' . $i,
                'alamat_owner' => 'Alamat ' . $i,
                'nomorhp_owner' => '081234567' . rand(100, 999),
                'verified' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function generateRandomNumber($length)
    {
        $numbers = '';
        for ($i = 0; $i < $length; $i++) {
            $numbers .= rand(0, 9);
        }
        return $numbers;
    }
}
