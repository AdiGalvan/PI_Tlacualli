<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calles extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_colonia'
    ];

    public function colonia() 
    {
        return $this->belongsTo(Colonias::class, 'id_colonia');
    }
}
