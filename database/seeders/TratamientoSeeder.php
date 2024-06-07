<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use Illuminate\Database\Seeder;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tratamiento::create([
            'id_medicamento' => 1,
            'id_cerda' => 5124,
            'fecha_comienzo' => now(),
            'fecha_conclusion' => now()->addDays(5),
            'enfermedad' => 'Gripe porcina',
        ]);
    }
}
