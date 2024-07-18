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

    public function calles() 
    {
        return $this->hasMany(Calles::class, 'id', 'id_calle');
    }

    public function usuarios()
    {
        return $this->hasOne(usuarios::class, 'id', 'id_usuario');
    }
}
