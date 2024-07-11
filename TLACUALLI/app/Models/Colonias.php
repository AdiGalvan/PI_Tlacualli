<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonias extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'CP',
        'id_municipio'
    ];

    public function municipios() 
    {
        return $this->hasOne(Municipios::class, 'id', 'id_municipio');
    }
}
