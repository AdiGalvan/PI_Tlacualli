<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'nombre',
        'contenido',
        'fecha_publicacion',
        'costo',
        'fecha_revision',
        'notas',
        'estatus',
        'id_usuario',
        'id_tipo',
        'id_usuario_revision'
    ];

    public function usuario()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_usuario');
    }

    public function tipo()
    {
        return $this->hasOne(TiposPublicaciones::class, 'id', 'id_tipo');
    }

    public function proveedor()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
