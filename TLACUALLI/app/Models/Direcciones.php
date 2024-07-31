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
        return $this->belongsTo(Municipios::class, 'id', 'id_municipio');
    }

    public function estado()
    {
        return $this->belongsTo(Estados::class, 'id', 'id_estado');
    }

    public function usuario()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_usuario');
    }

    public function direccion() {
        return $this->belongsTo(Usuarios::class, 'id_direccion_envios');
    }

    public function direccionF() {
        return $this->belongsTo(Usuarios::class, 'id_direccion_fiscal');
    }
    //Funcion para obtener todos los datos de la direccion personal
    public static function getDireccionEnvio($persona) 
    {
        return self::with([
            'direccion' => function($query) {
                $query->select('num_ext', 'num_int', 'id_calle');
            },
            'direccion.calle' => function($query) {
                $query->select('id', 'nombre', 'id_colonia');
            },
            'direccion.calle.colonia' => function($query) {
                $query->select('id', 'nombre', 'CP', 'id_municipio');
            },
            'direccion.calle.colonia.municipio' => function($query) {
                $query->select('id', 'nombre', 'id_estado');
            },
            'direccion.calle.colonia.municipio.estado' => function($query) {
                $query->select('id', 'nombre');
            }
        ])
        ->where('id', $persona)
        ->first();
    }

    //Funcion para obtener todos los datos de la direccion fiscal
    public static function getDireccionFiscal($persona)
    {
        return self::with([
            'direccionF' => function($query) {
                $query->select('num_ext', 'num_int', 'id_calle');
            },
            'direccionF.calle' => function($query) {
                $query->select('id', 'nombre', 'id_colonia');
            },
            'direccionF.calle.colonia' => function($query) {
                $query->select('id', 'nombre', 'CP', 'id_municipio');
            },
            'direccionF.calle.colonia.municipios' => function($query) {
                $query->select('id', 'nombre', 'id_estado');
            },
            'direccionF.calle.colonia.municipios.estados' => function($query) {
                $query->select('id', 'nombre');
            }
        ])
        ->where('id', $persona)
        ->first();
    }
}

