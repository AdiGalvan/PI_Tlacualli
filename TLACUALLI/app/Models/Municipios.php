<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_estado'
    ];

    public function estados()
    {
        return $this->hasOne(Estados::class, 'id', 'id_estado');
    }
}
