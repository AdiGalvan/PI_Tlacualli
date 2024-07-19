<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_ext',
        'num_int',
        'id_calle'
    ];

    public function calle()
    {
        return $this->belongsTo(Calles::class, 'id_calle');
    }

    public function colonia()
    {
        return $this->belongsTo(Colonias::class, 'id_colonia');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipios::class, 'id_municipio');
    }

    public function estado()
    {
        return $this->belongsTo(Estados::class, 'id_estado');
    }

    public function usuarios()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_usuario');
    }
}
