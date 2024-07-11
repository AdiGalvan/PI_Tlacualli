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

    public function colonias() 
    {
        return $this->hasOne(Colonias::class, 'id', 'id_colonia');
    }
}
