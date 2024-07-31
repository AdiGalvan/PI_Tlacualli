<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'costo', 
        'contenido',
        'stock', 
        'estatus', 
        'proveedor_id'
    ];

    public function usuario()
    {
        return $this->hasOne(Usuarios::class, 'id', 'id_usuario');
    }



}
