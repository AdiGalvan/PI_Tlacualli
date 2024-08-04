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

        if(Auth::check()){
            $solicitudes = Solicitudes::where('id_cliente', $usuarioId)
            ->with(['proveedor', 'servicio']) // Asegúrate de que esta relación está bien definida en el modelo Solicitud
            ->get();
            return view('partials.solicitudes.mis_solicitudes', compact('solicitudes'));
        }
    }

    public function store(Request $request)
    {
        $usuarioId = Auth::id();

        if(Auth::check()){
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
}
