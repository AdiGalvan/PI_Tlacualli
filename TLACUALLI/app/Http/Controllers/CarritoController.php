<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrdenVenta;
use App\Models\RelacionProductoOrden;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregarAlCarrito(Request $request, $id_producto)
    {
        // Validar la cantidad recibida
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        // Verificar si el producto existe y está activo
        $producto = Producto::where('estatus', 1)->where('id', $id_producto)->first();

        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado o inactivo');
        }

        // Obtener o crear la orden de venta
        $ordenVenta = OrdenVenta::where('id_cliente', Auth::id())
            ->where('estatus', 1)
            ->where('conclusion', 1)
            ->first();

        if (!$ordenVenta) {
            $ordenVenta = OrdenVenta::create([
                'id_cliente' => Auth::id(),
                'total' => 0, // Se actualizará más tarde
                'fecha' => now(),
                'estatus' => 1,
                'conclusion' => 1
            ]);
        }

        // Obtener la cantidad solicitada
        $cantidadSolicitada = $request->input('cantidad');

        // Verificar si la cantidad solicitada no supera el stock disponible
        if ($cantidadSolicitada > $producto->stock) {
            return redirect()->back()->with('error', 'Cantidad solicitada excede el stock disponible');
        }

        // Verificar si el producto ya está en la orden
        $relacion = RelacionProductoOrden::where('id_orden', $ordenVenta->id)
            ->where('id_producto', $id_producto)
            ->first();

        if ($relacion) {
            // Si el producto ya está en la orden, actualizar la cantidad y subtotal
            $nuevaCantidad = $relacion->cantidad + $cantidadSolicitada;

            if ($nuevaCantidad > $producto->stock) {
                return redirect()->back()->with('error', 'Cantidad total solicitada excede el stock disponible');
            }

            // Calcular el nuevo subtotal
            $nuevoSubtotal = $producto->costo * $nuevaCantidad;

            // Actualizar la relación
            $relacion->update([
                'cantidad' => $nuevaCantidad,
                'subtotal' => $nuevoSubtotal
            ]);

            // Actualizar el total de la orden
            $total_real = $ordenVenta->productos->sum('subtotal') - $relacion->subtotal + $nuevoSubtotal;
        } else {
            // Calcular el subtotal para un nuevo producto
            $subtotal = $producto->costo * $cantidadSolicitada;

            // Crear una nueva relación
            RelacionProductoOrden::create([
                'id_orden' => $ordenVenta->id,
                'id_producto' => $id_producto,
                'cantidad' => $cantidadSolicitada,
                'subtotal' => $subtotal
            ]);

            // Actualizar el total de la orden
            $total_real = $ordenVenta->productos->sum('subtotal') + $subtotal;
        }

        // Actualizar el total de la orden
        $ordenVenta->update(['total' => $total_real]);

        // Actualizar el stock del producto
        $producto->update(['stock' => $producto->stock - $cantidadSolicitada]);

        return redirect()->back()->with('cartadd', 'Producto agregado al carrito exitosamente.');
    }

    public function eliminarDelCarrito($id_producto)
    {
        // Obtener la orden de venta activa del cliente
        $ordenVenta = OrdenVenta::where('id_cliente', Auth::id())
            ->where('estatus', 1)
            ->where('conclusion', 1)
            ->first();

        if (!$ordenVenta) {
            return redirect()->back()->with('error', 'No hay orden de venta activa.');
        }

        // Obtener la relación producto-orden
        $relacion = RelacionProductoOrden::where('id_orden', $ordenVenta->id)
            ->where('id_producto', $id_producto)
            ->first();

        if (!$relacion) {
            return redirect()->back()->with('error', 'Producto no encontrado en el carrito.');
        }

        // Obtener el producto
        $producto = Producto::find($id_producto);

        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        // Restituir el stock del producto
        $producto->update(['stock' => $producto->stock + $relacion->cantidad]);

        // Eliminar la relación producto-orden
        $relacion->delete();

        // Actualizar el total de la orden
        $total_real = $ordenVenta->productos->sum('subtotal');
        $ordenVenta->update(['total' => $total_real]);

        return redirect()->back()->with('cartremove', 'Producto eliminado del carrito exitosamente.');
    }

    public function confirmarOrden()
    {
        // Obtener la orden de venta activa del cliente
        $ordenVenta = OrdenVenta::where('id_cliente', Auth::id())
            ->where('estatus', 1)
            ->where('conclusion', 1)
            ->first();

        if (!$ordenVenta) {
            return redirect()->back()->with('error', 'No hay orden de venta activa.');
        }

        // Actualizar el estado y la conclusión de la orden
        $ordenVenta->update([
            'estatus' => 0
        ]);

        return redirect()->back()->with('success', 'Orden de compra confirmada exitosamente.');
    }
}
