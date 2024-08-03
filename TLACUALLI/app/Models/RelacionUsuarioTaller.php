<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionUsuarioTaller extends Model
{
    use HasFactory;

    protected $table = 'relacion_usuario_taller'; // Nombre correcto de la tabla

    protected $fillable = [
        'id_cliente',
        'id_publicacion',
        'estatus',
        'conclusion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Usuarios::class, 'id_cliente');
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicaciones::class, 'id_publicacion');
    }
}
