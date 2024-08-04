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
        return $this->belongsToMany(Producto::class, 'relacion_producto_orden', 'id_orden', 'id_producto')
            ->withPivot('id', 'cantidad', 'subtotal');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_cliente');
    }
}
