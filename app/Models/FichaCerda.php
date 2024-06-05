<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaCerda extends Model
{
    use HasFactory;

    protected $table = 'fichas_cerdas';
    protected $primaryKey = 'id_cerda';

    protected $fillable = ['id_nave', 'nfc'];

    public function cubriciones()
    {
        return $this->hasMany(Cubricion::class, 'id_cerda');
    }

    public function nave()
    {
        return $this->belongsTo(Nave::class, 'id_nave');
    }
    
    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'id_cerda');
    }
}
