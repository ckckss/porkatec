<?php

namespace Database\Seeders;

use App\Models\FichaCerda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FichaCerdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FichaCerda::create([
            'id_cerda' => 5124,
            'id_nave' => 1,
            'nfc' => 1311
        ]);
    }
}
