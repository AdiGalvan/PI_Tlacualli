<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\OrdenVenta;

class CartDropdown extends Component
{
    public $carrito;
    public $total;

    public function __construct()
    {
        $ordenVenta = OrdenVenta::where('id_cliente', Auth::id())
            ->where('estatus', 1)
            ->where('conclusion', 1)
            ->first();

        // Obtener productos asociados a la orden de venta y total de la orden
        if ($ordenVenta) {
            $this->carrito = $ordenVenta->productos;
            $this->total = $ordenVenta->total;
        } else {
            $this->carrito = collect([]);
            $this->total = 0;
        }
        //dd($this->carrito);
    }
    public function render()
    {
        return view('components.cart-dropdown', [
            'carrito' => $this->carrito,
            'total' => $this->total,
        ]);
    }
}
