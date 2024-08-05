<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use App\Models\Usuarios;

use Illuminate\Http\Request;
use App\Http\Requests\validadorFormServicios;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Carbon\carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $usuario = Usuarios::with('roles')
                ->find($usuarioId);
        } else {
            //Si no está autenticado se crea una clase generica para que pueda visualizar todos los talleres activos
            $usuario = new \stdClass();
            $usuario->roles = new \stdClass();
            $usuario->roles->id = null;
        }
        //Busca todas las publicaciones de tipo taller, activas y con los datos del publicador
        $servicios = Publicaciones::where('id_tipo', 3)
            ->where('estatus', true)
            ->with('usuario')
            ->get();
        return view('partials.servicios.servicios', compact('servicios', 'usuario'));
    }

    public function indexMisServicios()
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $usuario = Usuarios::with('roles')
                ->find($usuarioId);
        } else {
            //Si no está autenticado se crea una clase generica para que pueda visualizar todos los talleres activos
            $usuario = new \stdClass();
            $usuario->roles = new \stdClass();
            $usuario->roles->id = null;
        }
        //Busca todas las publicaciones de tipo taller, activas y con los datos del publicador
        $servicios = Publicaciones::where('id_tipo', 3)
            ->where('id_usuario', Auth::id())
            ->with('usuario')
            ->get();

        return view('partials.servicios.mis_servicios', compact('servicios'));
    }

    public function misServiciosSolicitados()
    {
        $solicitudes = DB::table('solicitudes')
            ->join('usuarios as clientes', 'solicitudes.id_cliente', '=', 'clientes.id')
            ->join('usuarios as proveedores', 'solicitudes.id_proveedor', '=', 'proveedores.id')
            ->join('publicaciones', 'solicitudes.id_publicacion', '=', 'publicaciones.id')
            ->select(
                'solicitudes.id',
                'clientes.nombre_usuario as cliente',
                'proveedores.nombre_usuario as proveedor',
                'solicitudes.descripcion',
                'publicaciones.descripcion as tipo_servicio',
                'solicitudes.fecha'
            )
            ->where('solicitudes.estatus', 1) // Filtrar por estatus = 1
            ->orderBy('solicitudes.id', 'asc') // Ordenar por ID de forma ascendente
            ->get();

        return view('servicios.mis_servicios', compact('solicitudes'));
    }

    public function search(Request $request)
    {
        // Obtener los datos de búsqueda del formulario
        $cliente = $request->input('cliente');
        $proveedor = $request->input('proveedor');
        $fecha = $request->input('fecha');

        // Consulta base de solicitudes
        $query = DB::table('solicitudes')
            ->join('usuarios as clientes', 'solicitudes.id_cliente', '=', 'clientes.id')
            ->join('usuarios as proveedores', 'solicitudes.id_proveedor', '=', 'proveedores.id')
            ->join('publicaciones', 'solicitudes.id_publicacion', '=', 'publicaciones.id')
            ->select(
                'solicitudes.id',
                'clientes.nombre_usuario as cliente',
                'proveedores.nombre_usuario as proveedor',
                'solicitudes.descripcion',
                'publicaciones.descripcion as tipo_servicio',
                'solicitudes.fecha'
            )
            ->where('solicitudes.estatus', 1); // Filtrar por estatus activo

        // Aplicar filtros según los datos recibidos del formulario
        if (!empty($cliente)) {
            $query->where('clientes.nombre_usuario', 'LIKE', "%$cliente%");
        }

        if (!empty($proveedor)) {
            $query->where('proveedores.nombre_usuario', 'LIKE', "%$proveedor%");
        }

        if (!empty($fecha)) {
            $query->whereDate('solicitudes.fecha', $fecha);
        }

        // Obtener los resultados de la consulta
        $solicitudes = $query->orderBy('solicitudes.id')->get();

        // Si no se encuentran resultados, devolver un mensaje de sesión
        if ($solicitudes->isEmpty()) {
            return redirect('/mis_servicios')->with('noResults', 'No se encontraron resultados para la búsqueda especificada.');
        }

        // Devolver la vista con los resultados encontrados
        return view('servicios.mis_servicios', compact('solicitudes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //Esta opción es la misma para obtener nombre del cliente y del proveedor (se selecciona), se filtarán nombres de acuerdo con el rol
        $opciones = DB::table('usuarios')->pluck('nombre_usuario', 'id');


        // Tipo de publicación
        $t_servicio = DB::table('publicaciones')->pluck('descripcion', 'id');



        //Tipo de solicitud
        $t_solicitud = DB::table('tipos_solicitudes')->pluck('nombre', 'id');


        return view('servicios.servicios', compact('opciones', 't_servicio', 't_solicitud'));
    }

    /**
     * Store a newly created resource in storage (inserts).
     */
    // public function store(validadorFormServicios $request)
    // {
    //     DB::table('solicitudes')->insert([
    //         "id_cliente" => $request->input('nombre'),
    //         "id_proveedor" => $request->input('proveedor'),
    //         "descripcion" => $request->input('descripcion'),
    //         "id_publicacion" => $request->input('t_servicio'),
    //         "id_tipo" => 2,
    //         "fecha" => $request->input('fecha'),
    //         "created_at" => Carbon::now(),
    //         "updated_at" => Carbon::now(),
    //     ]);
    //     return redirect('/mis_servicios')->with('confirmacion', 'Tu solicitud se creó existosamente');
    // }


    public function store(Request $request)
    {
        $usuarioId = Auth::id();
        if (Auth::check()) {

            // Validaciones
            $validator = $request->validate([
                '_ns'       => 'required',
                '_descS'    => 'required',
                '_costoS'   => 'required|numeric',
            ]);
            // Insertar el servicio
            $servicio = new Publicaciones();
            $servicio->nombre = $validator['_ns'];
            $servicio->descripcion = $validator['_descS'];
            $servicio->costo = $validator['_costoS'];
            $servicio->notas = $request['_notaS'];
            $servicio->fecha_publicacion = Carbon::now()->toDateString();
            $servicio->id_usuario = $usuarioId;
            $servicio->id_tipo = 3;
            $servicio->estatus = true;
            $servicio->contenido = '';
            $servicio->save(); // Guardar primero para obtener el ID

            return redirect()->back()->with('success', 'Servicio registrado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $solicitud = DB::table('solicitudes')->where('id', $id)->first();

        if (!$solicitud) {
            abort(404); // Si no se encuentra la solicitud
        }

        $opciones = DB::table('usuarios')->pluck('nombre_usuario', 'id');
        $t_servicio = DB::table('publicaciones')->pluck('descripcion', 'id');

        return view('servicios.actualizar_formulario', compact('solicitud', 'opciones', 't_servicio'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(validadorFormServicios $request, $id)
    // {
    //     $request->validate([
    //         'nombre' => 'required',
    //         'proveedor' => 'required',
    //         'descripcion' => 'required',
    //         't_servicio' => 'required',
    //         'fecha' => 'required|date',
    //     ]);

    //     // Actualizar el registro 
    //     DB::table('solicitudes')->where('id', $id)->update([
    //         "id_cliente" => $request->input('nombre'),
    //         "id_proveedor" => $request->input('proveedor'),
    //         "descripcion" => $request->input('descripcion'),
    //         "id_publicacion" => $request->input('t_servicio'),
    //         "fecha" => $request->input('fecha'),
    //         "updated_at" => Carbon::now(),
    //     ]);

    //     return redirect('/mis_servicios')->with('confirmacion', 'Actualización realizada con éxito');
    // }
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            // Busca los datos del servicio
            $servicio = Publicaciones::findOrFail($id);

            // Validaciones
            $validator = $request->validate([
                '_ns'       => 'required',
                '_descS'    => 'required',
                '_costoS'   => 'required|numeric',
                '_notaS'    => 'nullable',
                '_contS'    => 'nullable',
            ]);

            $servicio->nombre = $validator['_ns'];
            $servicio->descripcion = $validator['_descS'];
            $servicio->costo = $validator['_costoS'];
            $servicio->notas = $validator['_notaS'];
            $servicio->updated_at = Carbon::now()->toDateString();
            $servicio->save();

            return redirect()->back()->with('success', 'Servicio actualizado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }


    // public function editForm($id)
    // {
    //     $solicitud = DB::table('solicitudes')->where('id', $id)->first();

    //     if (!$solicitud) {
    //         abort(404); // Si no se encuentra la solicitud
    //     }

    //     $opciones = DB::table('usuarios')->pluck('nombre_usuario', 'id');
    //     $t_servicio = DB::table('publicaciones')->pluck('descripcion', 'id');

    //     return view('servicios.eliminar_formulario', compact('solicitud', 'opciones', 't_servicio'));
    // }

    // public function softDelete($id)
    // {
    //     DB::table('solicitudes')->where('id', $id)->update([
    //         'estatus' => 0,
    //         'updated_at' => Carbon::now(),
    //     ]);

    //     return redirect('/mis_servicios')->with('confirmacion', 'Registro eliminado exitosamente');
    // }

    public function offStatus($id)
    {
        if (Auth::check()) {
            $servicio = Publicaciones::findOrFail($id);
            $servicio->estatus = 0;
            $servicio->updated_at = Carbon::now();
            $servicio->save();

            return redirect()->back()->with('off', 'Servicio desactivado exitosamente.');
        } else {
            abort(400, 'Servicio no encontrado');
        }
    }

    public function onStatus($id)
    {
        if (Auth::check()) {
            $servicio = Publicaciones::findOrFail($id);
            $servicio->estatus = 1;
            $servicio->updated_at = Carbon::now();
            $servicio->save();

            return redirect()->back()->with('on', 'Servicio activado exitosamente.');
        } else {
            abort(400, 'Servicio no encontrado');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
