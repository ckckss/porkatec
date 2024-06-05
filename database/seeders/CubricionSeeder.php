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
        Cubricion::create([
            'id_cubricion' => 3,
            'id_cerda' => 3872,
            'fecha_cubricion' => '2002-05-19',
            'estado' => '',
            'fecha_parto' => '2002-06-05',
            'nacidos_vivos' => 16,
            'nacidos_muertos' => 2,
            'nacidos_momificados' => 0,
            'num_adoptados' => 2,
            'num_cedidos' => 1,
            'num_bajas' => 2,
            'fecha_destete' => '2002-06-25',
            'num_destetados' => 15
        ]);
    }
}
