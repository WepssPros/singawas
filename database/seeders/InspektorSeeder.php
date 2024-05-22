<?php

namespace Database\Seeders;

use App\Models\Inspektor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InspektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Inspektor::create([
                'user_id' => null,
                'foto_inspektor' => $faker->imageUrl(),
                'nama_inspektor' => $faker->name(),
                'no_hp' => $faker->phoneNumber(),
                'posisi_jabatan' => $faker->jobTitle(),
            ]);
        }
    }
}
