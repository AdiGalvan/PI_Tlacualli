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

class NotificacionesController extends Controller
{
    public function index()
    {
        // Obtener el ID del proveedor autenticado
        $proveedorId = Auth::id();
        $mis_ordenes = RelacionProductoOrden::where('conclusion', 1)
            ->whereHas('producto', function ($query) {
                $query->where('proveedor_id', Auth::id());
            })
            ->whereHas('orden', function ($query) {
                $query->where('estatus', 0)
                    ->where('conclusion', 1);
            })
            ->with(['producto', 'orden.usuario'])
            ->get();

        $mis_inscritos = RelacionUsuarioTaller::where('estatus', 0)
            ->where('conclusion', 1)
            ->with(['publicacion' => function ($query) use ($proveedorId) {
                $query->where('id_tipo', 2) // Solo talleres
                    ->where('id_usuario', $proveedorId); // Talleres del proveedor autenticado
            }, 'cliente']) // Eager load publicación y cliente
            ->get();

        $mis_solicitudes = Solicitudes::where('id_proveedor', Auth::id())
            ->where('estatus', 0)
            ->where('conclusion', 1)
            ->with(['cliente', 'servicio']) // Asegúrate de que esta relación está bien definida en el modelo Solicitud
            ->get();

        if (Auth::user()->id_rol != 1 && Auth::user()->id_rol != 2) {
            return view('notificaciones.index', ['mis_ordenes' => $mis_ordenes, 'mis_inscritos' => $mis_inscritos, 'mis_solicitudes' => $mis_solicitudes]);
        } else {
            return redirect('/');
        }
    }

    public function concluir_producto($id, $id2)
    {
        // Actualiza el campo `conclusion` en `relacion_producto_orden`
        RelacionProductoOrden::where('id', $id)
            ->update(['conclusion' => 0]);

        // Verifica si existen otros registros con el mismo id_orden y conclusion = 1
        $hasOtherConclusions = RelacionProductoOrden::where('id_orden', $id2)
            ->where('conclusion', 1)
            ->exists();
        if (!$hasOtherConclusions) {
            // Si todos los registros tienen conclusion = 0, actualiza la orden de venta
            OrdenVenta::where('id', $id2)
                ->update(['conclusion' => 0]);
        }

        return redirect()->back()->with('success', 'Orden concluida.');
    }
    public function concluir_taller($id)
    {
        // Encuentra el registro en relacion_usuario_taller
        $relacion = RelacionUsuarioTaller::findOrFail($id);

        // Actualiza el campo `conclusion` de 1 a 0
        if ($relacion->conclusion == 1) {
            $relacion->update(['conclusion' => 0]);
        }

        return redirect()->back()->with('success', 'Registro actualizado.');
    }
    public function concluir_servicio($id)
    {
        // Encuentra el registro en relacion_usuario_taller
        $solicitud = Solicitudes::findOrFail($id);

        // Actualiza el campo `conclusion` de 1 a 0
        if ($solicitud->conclusion == 1) {
            $solicitud->update(['conclusion' => 0]);
        }

        return redirect()->back()->with('success', 'Solicitud actualizado.');
    }
}
