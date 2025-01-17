<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_pais'
    ];

    public function paises()
    {
        return $this->belongsTo(Paises::class, 'id_pais');
    }
}
