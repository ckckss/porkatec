<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $table = 'tratamientos';
    protected $primaryKey = 'id_tratamiento';
    public $timestamps = false;

    protected $fillable = ['id_medicamento', 'id_cerda', 'fecha_comienzo', 'fecha_conclusion', 'enfermedad'];

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento', 'id');
    }

    public function cerda()
    {
        return $this->belongsTo(FichaCerda::class, 'id_cerda', 'id_cerda');
    }
}
