<?php

namespace Database\Seeders;

use App\Models\Cubricion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CubricionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cubricion::create([
            'id_cubricion' => 1,
            'id_cerda' => 5124,
            'fecha_cubricion' => '2002-09-21',
            'estado' => '',
            'fecha_parto' => '2002-10-07',
            'nacidos_vivos' => 17,
            'nacidos_muertos' => 3,
            'nacidos_momificados' => 1,
            'num_adoptados' => 3,
            'num_cedidos' => 2,
            'num_bajas' => 4,
            'fecha_destete' => '2002-10-27',
            'num_destetados' => 14
        ]);
    }
}
