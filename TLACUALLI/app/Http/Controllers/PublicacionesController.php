<?php

namespace App\Http\Controllers;
use App\Models\Publicaciones;
use App\Models\Usuarios;
use Illuminate\Http\Request;

use Carbon\Carbon;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Metodo temporal ya que no hay de momento roles o login
        //Obtener todas las publicaciones de tipo taller
        $publicaciones = Publicaciones::where('id_tipo', 2)->with('usuario')->get();
        
        //Envia talleres a la vista de talleres
        return view('talleres', compact('publicaciones'));
    }

    public function index_mis_talleres()
    {
        //Metodo temporal ya que no hay de momento roles o login
        //Obtener todas las publicaciones de tipo taller
        $publicaciones = Publicaciones::where('id_tipo', 2)->with('usuario')->get();
        
        //Envia talleres a la vista de talleres
        return view('mis_talleres', compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //Validaciones
        $validator = $request->validate([
            '_descT'                => 'required',
            '_nt'                   => 'required|max:50',
            '_contT'                => 'required|file|max:2048',
            '_costoT'               => 'numeric',
            //'id_usuario'            => 'required',
            //'id_tipo'               => 'required',
            //'id_usuario_revision'   => 'required',
            //'fecha_revision'        => 'date',
            //'estatus'               => 'required'
        ]);

        $userId = 2; //Id temporal, posteriormente se debe utilizar id de usuario en sesion
        //Subir el archivo
        if ($request->hasFile('_contT')) {
            $file = $request->file('_contT');
            
            $filename = $userId . '_2_' . $file->getClientOriginalName();

            $filePath = $file->storeAs('uploads', $filename, 'public');
        } else {
            return redirect()->back()->with('error', 'Error al subir el archivo.');
        }
        
        //Insert de publicación
        $publicacion = new Publicaciones();
        $publicacion->descripcion = $validator['_descT'];
        $publicacion->nombre = $validator['_nt'];
        $publicacion->contenido = $filePath;
        $publicacion->fecha_publicacion = Carbon::now()->toDateString();
        $publicacion->costo = $validator['_costoT'];
        $publicacion->id_usuario = 2; //$validator['id_usuario']; //Temporal ya que aun no hay login
        $publicacion->id_tipo = 2; 
        $publicacion->estatus = true;//$validator['estatus']; //Temporal ya que aun no hay manejp de status
        $publicacion->save();

        return redirect()->back()->with('success', 'Publicación creada exitosamente.');
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

    // Definición de la relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
