<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'contraseña',
        'fecha_nacimiento',
        'nombre',
        'apelldo_paterno',
        'apellido_materno',
        'RFC',
        'telefono',
        'descripcion',
        'slogan',
        'avatar',
        'estatus',
        'id_direccion_envios',
        'id_direccion_fiscal',
        'id_sexo',
        'id_rol'
    ];

    public function direcciones()
    {
        return $this->hasOne(Direcciones::class, 'id', 'id_direccion_envios');
    }

    public function sexos()
    {
        return $this->hasOne(Sexos::class, 'id', 'id_sexo');
    }

    public function roles()
    {
        return $this->hasOne(Roles::class, 'id', 'id_rol');
    }
}
