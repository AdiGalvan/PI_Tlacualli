<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Solicitudes;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SolicitudesController extends Controller
{
    //
    public function index()
    {
        return view('partials.solicitudes.mis_solicitudes');
    }

    public function indexMisSolicitudes()
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $mis_solicitudes = Solicitudes::where('id_cliente', $usuarioId)
                ->with(['proveedor', 'servicio']) // Asegúrate de que esta relación está bien definida en el modelo Solicitud
                ->get();

            // $mis_inscritos = 
            return view('notificaciones.index', compact('mis_solicitudes'));
        }
    }

    public function storeServicio(Request $request)
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $validator = $request->validate([
                '_descS'       => 'required',
            ]);

            $servicioId = $request->input('servicio_id');
            $proveedorId = $request->input('proveedor_id');

            $solicitud = new Solicitudes();
            $solicitud->id_cliente = $usuarioId;
            $solicitud->id_proveedor = $proveedorId;
            $solicitud->descripcion = $validator['_descS'];
            $solicitud->id_publicacion = $servicioId;
            $solicitud->id_tipo = 2;
            $solicitud->fecha = Carbon::now();
            $solicitud->estatus = 1;
            $solicitud->save();
            return redirect()->back()->with('success', 'Servicio solicitado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    public function storeTaller(Request $request)
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $tallerId = $request->input('taller_id');
            $talleristaId = $request->input('tallerista_id');

            $solicitud = new Solicitudes();
            $solicitud->id_cliente = $usuarioId;
            $solicitud->id_proveedor = $talleristaId;
            $solicitud->descripcion = 'Taller';
            $solicitud->id_publicacion = $tallerId;
            $solicitud->id_tipo = 1;
            $solicitud->fecha = Carbon::now();
            $solicitud->estatus = 1;
            $solicitud->save();
            return redirect()->back()->with('success', 'Servicio solicitado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }
}
