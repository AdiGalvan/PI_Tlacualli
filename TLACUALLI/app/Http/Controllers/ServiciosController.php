<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorFormServicios;

use Carbon\carbon;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    if (!session()->has('id_usuario')) {
        return redirect('/');
    }

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

    // Obtener opciones para los selects
    $opciones = DB::table('usuarios')->pluck('nombre_usuario', 'id');
    $t_servicio = DB::table('publicaciones')->pluck('descripcion', 'id');

    return view('servicios.mis_servicios', compact('solicitudes', 'opciones', 't_servicio'));
}

    public function search(Request $request)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
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
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
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
    public function store(validadorFormServicios $request)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        DB::table('solicitudes')->insert([
            "id_cliente" => $request->input('nombre'),
            "id_proveedor" => $request->input('proveedor'),
            "descripcion" => $request->input('descripcion'),
            "id_publicacion" => $request->input('t_servicio'),
            "id_tipo" => 2,
            "fecha" => $request->input('fecha'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return redirect('/mis_servicios')->with('confirmacion', 'Tu solicitud se creó existosamente');
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
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
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
    public function update(validadorFormServicios $request, $id)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }

        $request->validate([
            'nombre' => 'required',
            'proveedor' => 'required',
            'descripcion' => 'required',
            't_servicio' => 'required',
            'fecha' => 'required|date',
        ]);

        // Actualizar el registro 
        DB::table('solicitudes')->where('id', $id)->update([
            "id_cliente" => $request->input('nombre'),
            "id_proveedor" => $request->input('proveedor'),
            "descripcion" => $request->input('descripcion'),
            "id_publicacion" => $request->input('t_servicio'),
            "fecha" => $request->input('fecha'),
            "updated_at" => Carbon::now(),
        ]);

        return redirect('/mis_servicios')->with('confirmacion', 'Actualización realizada con éxito');
    }

    public function editForm($id)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        $solicitud = DB::table('solicitudes')->where('id', $id)->first();

        if (!$solicitud) {
            abort(404); // Si no se encuentra la solicitud
        }

        $opciones = DB::table('usuarios')->pluck('nombre_usuario', 'id');
        $t_servicio = DB::table('publicaciones')->pluck('descripcion', 'id');

        return view('servicios.eliminar_formulario', compact('solicitud', 'opciones', 't_servicio'));
    }

    public function softDelete($id)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        DB::table('solicitudes')->where('id', $id)->update([
            'estatus' => 0,
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/mis_servicios')->with('confirmacion', 'Registro eliminado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
