<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cliente',
        'id_proveedor',
        'descripcion',
        'id_publicacion',
        'id_tipo',
        'fecha',
        'estatus',
        'conclusion'
    ];

    public function tipo()
    {
        return $this->hasOne(TiposSolicitudes::class, 'id', 'id_tipo');
    }

    public function cliente()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_cliente');
    }

    public function proveedor()
    {
        return $this->belongsTo(Usuarios::class, 'id_proveedor');
    }

    public function servicio()
    {
        return $this->belongsTo(Publicaciones::class, 'id_publicacion');
    }
}
