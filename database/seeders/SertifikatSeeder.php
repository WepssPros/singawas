<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sertifikat;
use App\Models\Inspektor;
use App\Models\Inspeksi;
use App\Models\Kendaraan;
use Faker\Factory as Faker;

class SertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua data dari model
        $inspektors = Inspektor::all();
        $inspeksis = Inspeksi::all();
        $kendaraans = Kendaraan::all();

        for ($i = 0; $i < 10; $i++) {
            Sertifikat::create([
                'inspektor_id' => $inspektors->random()->id,
                'inspeksi_id' => $inspeksis->random()->id,
                'kendaraan_id' => $kendaraans->random()->id,
                'sertifikat_number' => $faker->numerify('##########'), // 10 digit random number
                'valid_from_date' => $faker->date(),
                'valid_until_date' => $faker->date(),
                'issued_by' => $faker->company,
                'verified' => $faker->boolean(),
            ]);
        }
    }
}
