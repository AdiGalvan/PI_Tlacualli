<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

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

    protected $hiddens = [
        'contraseña', 'remember_token'
    ];

    public function direcciones()
    {
        return $this->hasOne(Direcciones::class);
    }

    public function sexos()
    {
        return $this->belongsTo(Sexos::class, 'id_sexo');
    }

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'id_rol');
    }

    //Direccion personal
    public function direccion() 
    {
        return $this->hasOne(Direcciones::class, 'id', 'id_direccion_envios');
    }

    //Direccion fiscal
    public function direccionF()
    {
        return $this->hasOne(Direcciones::class, 'id', 'id_direccion_fiscal');
    }

    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
