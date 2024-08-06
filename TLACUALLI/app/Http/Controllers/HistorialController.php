<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\OrdenVenta;
use App\Models\RelacionUsuarioTaller;
use App\Models\RelacionProductoOrden;
use App\Models\Solicitudes;
use App\Models\Usuarios;
use Carbon\Carbon;

class HistorialController extends Controller
{
    public function index()
    {
        // Obtener el ID del proveedor autenticado
        $usuarioId = Auth::id();
        $mis_ordenes = RelacionProductoOrden::where('conclusion', 1)
            ->whereHas('orden', function ($query) use ($usuarioId) {
                $query->where('estatus', 0) // Orden activa
                    ->where('conclusion', 1) // Orden no concluida
                    ->where('id_cliente', $usuarioId); // Orden del cliente autenticado
            })
            ->with(['producto.proveedor', 'orden.usuario']) // Cargar relaciones
            ->get();


        $mis_inscritos = RelacionUsuarioTaller::where('estatus', 0)
            ->where('conclusion', 1)
            ->where('id_cliente', $usuarioId)
            ->with('publicacion.usuario') // Obtener la publicación del taller
            ->get();

        $mis_solicitudes = Solicitudes::where(function ($query) use ($usuarioId) {
            $query->where('id_proveedor', $usuarioId) // Solicitudes donde el usuario es proveedor
                ->orWhere('id_cliente', $usuarioId); // Solicitudes donde el usuario es cliente
        })
            ->where('estatus', 0)
            ->where('conclusion', 1)
            ->with(['cliente', 'servicio.usuario']) // Asegúrate de que esta relación está bien definida en el modelo Solicitudes
            ->get();

        $mis_ordenes_con = RelacionProductoOrden::whereHas('orden', function ($query) use ($usuarioId) {
            $query->where('estatus', 0) // Orden activa
                ->where('conclusion', 0) // Orden no concluida
                ->where('id_cliente', $usuarioId); // Orden del cliente autenticado
        })
            ->with(['producto.proveedor', 'orden.usuario']) // Cargar relaciones
            ->get();


        $mis_inscritos_con = RelacionUsuarioTaller::where('estatus', 0)
            ->where('conclusion', 0)
            ->where('id_cliente', $usuarioId)
            ->with('publicacion.usuario') // Obtener la publicación del taller
            ->get();

        $mis_solicitudes_con = Solicitudes::where(function ($query) use ($usuarioId) {
            $query->where('id_proveedor', $usuarioId) // Solicitudes donde el usuario es proveedor
                ->orWhere('id_cliente', $usuarioId); // Solicitudes donde el usuario es cliente
        })
            ->where('estatus', 0)
            ->where('conclusion', 0)
            ->with(['cliente', 'servicio.usuario']) // Asegúrate de que esta relación está bien definida en el modelo Solicitudes
            ->get();

        $mis_ordenes_can = RelacionProductoOrden::whereHas('orden', function ($query) use ($usuarioId) {
            $query->where('estatus', 1) // Orden activa
                ->where('conclusion', 0) // Orden no concluida
                ->where('id_cliente', $usuarioId); // Orden del cliente autenticado
        })
            ->with(['producto.proveedor', 'orden.usuario']) // Cargar relaciones
            ->get();


        $mis_inscritos_can = RelacionUsuarioTaller::where('estatus', 1)
            ->where('conclusion', 0)
            ->where('id_cliente', $usuarioId)
            ->with('publicacion.usuario') // Obtener la publicación del taller
            ->get();

        $mis_solicitudes_can = Solicitudes::where(function ($query) use ($usuarioId) {
            $query->where('id_proveedor', $usuarioId) // Solicitudes donde el usuario es proveedor
                ->orWhere('id_cliente', $usuarioId); // Solicitudes donde el usuario es cliente
        })
            ->where('estatus', 1)
            ->where('conclusion', 0)
            ->with(['cliente', 'servicio.usuario']) // Asegúrate de que esta relación está bien definida en el modelo Solicitudes
            ->get();

        if (Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2 || Auth::user()->id_rol == 7) {
            return view('historial.index', ['mis_ordenes' => $mis_ordenes, 'mis_inscritos' => $mis_inscritos, 'mis_solicitudes' => $mis_solicitudes, 'mis_ordenes_con' => $mis_ordenes_con, 'mis_inscritos_con' => $mis_inscritos_con, 'mis_solicitudes_con' => $mis_solicitudes_con, 'mis_ordenes_can' => $mis_ordenes_can, 'mis_inscritos_can' => $mis_inscritos_can, 'mis_solicitudes_can' => $mis_solicitudes_can]);
        } else {
            return redirect('/');
        }
    }

    public function cancelar_taller($id)
    {
        // Encuentra el registro en relacion_usuario_taller
        $relacion = RelacionUsuarioTaller::findOrFail($id);

        // Actualiza el campo `conclusion` de 1 a 0
        if ($relacion->conclusion == 1) {
            $relacion->update(['conclusion' => 0]);
            $relacion->update(['estatus' => 1]);
        }

        return redirect()->back()->with('success', 'Taller cancelado.');
    }
    public function cancelar_servicio($id)
    {
        // Encuentra el registro en relacion_usuario_taller
        $solicitud = Solicitudes::findOrFail($id);

        // Actualiza el campo `conclusion` de 1 a 0
        if ($solicitud->conclusion == 1) {
            $solicitud->update(['conclusion' => 0]);
            $solicitud->update(['estatus' => 1]);
        }

        return redirect()->back()->with('success', 'Solicitud cancelada.');
    }
    public function cancelar_orden($id)
    {
        // Buscar la relación producto-orden por ID
        $relacion = RelacionProductoOrden::find($id);

        if (!$relacion) {
            return redirect()->back()->with('error', 'Relación no encontrada.');
        }

        // Obtener la orden de venta asociada
        $ordenVenta = $relacion->orden;

        // Actualizar estatus y conclusión de la relación
        $relacion->update([
            'estatus' => 1,
            'conclusion' => 0,
        ]);

        // Reducir el total de la orden de venta
        $nuevoTotal = $ordenVenta->total - $relacion->subtotal;
        $ordenVenta->update(['total' => $nuevoTotal]);

        // Verificar si quedan más relaciones con la misma orden
        $otrasRelaciones = RelacionProductoOrden::where('id_orden', $ordenVenta->id)
            ->where('conclusion', 1)
            ->get();

        // Si no hay otras relaciones con conclusión 1, actualizar la orden
        if ($otrasRelaciones->isEmpty()) {
            $ordenVenta->update([
                'estatus' => 0,
                'conclusion' => 0,
            ]);
        }

        return redirect()->back()->with('success', 'Producto eliminado correctamente');
    }
}
