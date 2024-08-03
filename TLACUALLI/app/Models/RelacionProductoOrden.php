<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacionProductoOrden extends Model
{
    use HasFactory;

    protected $table = 'relacion_producto_orden'; // Nombre correcto de la tabla

    protected $fillable = [
        'id_orden',
        'id_producto',
        'cantidad',
        'subtotal'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function orden()
    {
        return $this->belongsTo(OrdenVenta::class, 'id_orden');
    }
}
