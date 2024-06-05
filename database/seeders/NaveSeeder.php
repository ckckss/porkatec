<?php

namespace Database\Seeders;

use App\Models\Nave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nave::create([
            'id_nave' => 1,
            'nombre' => "cubricion",
        ]);
    }
}
