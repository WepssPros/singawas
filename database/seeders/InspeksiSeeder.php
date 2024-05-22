<?php

namespace Database\Seeders;

use App\Models\Inspeksi;
use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InspeksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua kendaraan dari model Kendaraan
        $kendaraans = Kendaraan::all();

        foreach ($kendaraans as $kendaraan) {
            Inspeksi::create([
                'kendaraan_id' => $kendaraan->id,
                'tanggal_inspeksi' => $faker->date(),
                'hasil_inspeksi' => $faker->text(),
                'bukti_foto1' => $faker->imageUrl(),
                'bukti_foto2' => $faker->imageUrl(),
                'bukti_foto3' => $faker->imageUrl(),
                'verified' => $faker->boolean(),
            ]);
        }
    }
}
