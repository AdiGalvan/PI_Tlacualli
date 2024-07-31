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

    public function municipio() 
    {
        return $this->belongsTo(Municipios::class, 'id_municipio');
    }
}
