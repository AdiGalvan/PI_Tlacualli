<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];

    public function usuarios() 
    {
        return $this->hasMany(Usuarios::class, 'id', 'id_usuarios');
    }
}
