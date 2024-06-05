<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = 'medicamentos';
    
    public $timestamps = false;

    protected $fillable = ['nombre', 'dosis'];

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'id_medicamento', 'id');
    }
}
