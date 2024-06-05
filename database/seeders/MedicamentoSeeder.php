<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Seeder;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicamento::create([
            'nombre' => 'Antibiótico X',
            'dosis' => '10 mg',
        ]);
        Medicamento::create([
            'nombre' => 'Antibiótico Y',
            'dosis' => '20 mg',
        ]);
    }
}
