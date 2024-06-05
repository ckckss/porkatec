<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nave extends Model
{
    use HasFactory;
    
    protected $table = 'naves';
    protected $primaryKey = 'id_nave';
    protected $fillable = ['nombre'];

    public function cerdas()
    {
        return $this->hasMany(FichaCerda::class, 'id_nave');
    }
}
