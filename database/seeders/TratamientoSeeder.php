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
            'idMedicamento' => 1,
            'idCerda' => 3872,
            'fecha_comienzo' => now(),
            'fecha_conclusion' => now()->addDays(5),
            'enfermedad' => 'Gripe porcina',
        ]);
        Tratamiento::create([
            'idMedicamento' => 2,
            'idCerda' => 3872,
            'fecha_comienzo' => now(),
            'fecha_conclusion' => now()->addDays(19),
        ]);
    }
}
