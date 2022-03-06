<?php

namespace Database\Seeders;

use App\Models\Spp;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed spp
        Spp::create([
            'tahun' => '2020',
            'nominal' => 165000,
        ]);
        Spp::create([
            'tahun' => '2021',
            'nominal' => 170000,
        ]);
        Spp::create([
            'tahun' => '2022',
            'nominal' => 175000,
        ]);
    }
}
