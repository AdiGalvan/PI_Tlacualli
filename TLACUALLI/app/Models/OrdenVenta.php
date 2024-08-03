<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenVenta extends Model
{
    use HasFactory;

    protected $table = 'ordenes_ventas'; // Nombre correcto de la tabla

    protected $fillable = [
        'id_cliente',
        'total',
        'fecha',
        'estatus',
        'conclusion'
    ];

    public function productos()
    {
        return $this->hasMany(RelacionProductoOrden::class, 'id_orden', 'id');
    }
}
