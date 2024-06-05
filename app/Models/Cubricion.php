<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FichaCerda;

class Cubricion extends Model
{
    use HasFactory;

    protected $table = 'cubriciones';
    protected $primaryKey = 'id_cubricion';
    
    protected $fillable = [
        'id_cerda',
        'fecha_cubricion',
    ];

    public function cerda()
    {
        return $this->belongsTo(FichaCerda::class, 'id_cerda');
    }
}
    