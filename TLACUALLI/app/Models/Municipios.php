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

    public function estado()
    {
        return $this->belongsTo(Estados::class, 'id_estado');
    }
}
