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
        $solicitudes = DB::table('solicitudes')->get(); // Obtener todas las solicitudes de la base de datos
    
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


   return view('servicios.servicios', compact('opciones','t_servicio', 't_solicitud'));
    }

    /**
     * Store a newly created resource in storage (inserts).
     */
    public function store(validadorFormServicios $request)
    {
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
    return redirect('/servicios')->with('confirmacion','Tu solicitud se creó existosamente');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
