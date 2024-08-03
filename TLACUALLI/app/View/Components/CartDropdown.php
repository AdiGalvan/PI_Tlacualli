<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\OrdenVenta;
use App\Models\RelacionUsuarioTaller;

class CartDropdown extends Component
{
    public $carrito;
    public $carrito_talleres;
    public $total_carrito;

    public function __construct()
    {
        $ordenVenta = OrdenVenta::where('id_cliente', Auth::id())
            ->where('estatus', 1)
            ->where('conclusion', 1)
            ->first();

        // Obtener productos asociados a la orden de venta y total de la orden
        if ($ordenVenta) {
            $this->carrito = $ordenVenta->productos;
            $this->total_carrito = $ordenVenta->total;
        } else {
            $this->carrito = collect([]);
            $this->total_carrito = 0;
        }

        // Obtener talleres del usuario
        $this->carrito_talleres = RelacionUsuarioTaller::where('id_cliente', Auth::id())
            ->where('estatus', 1)
            ->with('publicacion') // Asegúrate de definir la relación 'publicacion' en RelacionUsuarioTaller
            ->get();

        // Sumar el costo de los talleres
        $totalTalleres = $this->carrito_talleres->sum(function ($relacion) {
            return $relacion->publicacion->costo;
        });

        // Actualizar el total del carrito con el costo de los talleres
        $this->total_carrito += $totalTalleres;
    }

    public function render()
    {
        return view('components.cart-dropdown', [
            'carrito' => $this->carrito,
            'carrito_talleres' => $this->carrito_talleres,
            'total_carrito' => $this->total_carrito,
        ]);
    }
}
