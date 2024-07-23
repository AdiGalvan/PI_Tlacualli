<?php

namespace App\Http\Controllers;
use App\Models\Publicaciones;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Verifica si el usuario está autenticado, si está autenticado se le habilita la opcion
        // para ir a sus talleres 
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $usuario = Usuarios::with('roles')
            ->find($usuarioId);
        }
        else {
            //Si no está autenticado se crea una clase generica para que pueda visualizar todos los talleres activos
            $usuario = new \stdClass();
            $usuario->roles = new \stdClass();
            $usuario->roles->id = null;
        }
        //Busca todas las publicaciones de tipo taller, activas y con los datos del publicador
        $publicaciones = Publicaciones::where('id_tipo', 2)
            ->where('estatus', true)
            ->with('usuario')
            ->get();
        
        //Envia talleres a la vista de talleres
        return view('talleres', compact('publicaciones', 'usuario'));
    }

    public function index_mis_talleres()
    {
        $usuarioId = Auth::id();
        
        if (Auth::check()){
            //Obtiene todos los talleres relacionados a este usuario
            $publicaciones = Publicaciones::where('id_usuario', $usuarioId)
            ->with('usuario')
            ->get();
            
            //Envia talleres a la vista de talleres
            return view('mis_talleres', compact('publicaciones'));
        }
        else {
            //Si no esta autenticado lo manda al home
            return redirect('/');
        }   
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
        $usuarioId = Auth::id();
        
        if (Auth::check()){
            //Validaciones
            $validator = $request->validate([
                '_descT'                => 'required',
                '_nt'                   => 'required|max:50',
                '_contT'                => 'required|file|max:2048', //Ruta de la imagen
                '_costoT'               => 'numeric',
                //'id_usuario_revision'   => 'required',
                //'fecha_revision'        => 'date',
            ]);

            //Subir el archivo imagen
            if ($request->hasFile('_contT')) {
                $file = $request->file('_contT');
                
                $filename = $usuarioId . '_2_' . $file->getClientOriginalName();

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
            $publicacion->id_usuario = $usuarioId;
            $publicacion->id_tipo = 2; //Tipo 2 porque son talleres
            $publicacion->estatus = false;
            $publicacion->save();

            return redirect()->back()->with('success', 'Publicación creada exitosamente.');
        }
        else {
            return redirect('/');
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
    public function edit()
    {
        $usuarioId = Auth::id();
        $publicaciones = Publicaciones::where('id_usuario', $usuarioId)
            ->with('usuario')
            ->get();
        return view('mis_talleres', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {        
        if (Auth::check()){
            //Busca todas los datos de dicha publicacion
            $publicacion = Publicaciones::findOrFail($id);

            // Validaciones
            $validator = $request->validate([
                '_descT' => 'required',
                '_nt' => 'required|max:50',
                '_contT' => 'nullable|file|max:2048', // Cambiado a nullable para permitir no cambiar el archivo
                '_costoT' => 'numeric',
            ]);

            // Actualización de campos
            $publicacion->descripcion = $validator['_descT'];
            $publicacion->nombre = $validator['_nt'];
            $publicacion->costo = $validator['_costoT'];

            // Subir el archivo si se proporciona uno nuevo
            if ($request->hasFile('_contT')) {
                $file = $request->file('_contT');
                $filename = $publicacion->id_usuario . '_2_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $filename, 'public');
                $publicacion->contenido = $filePath;
            }

            // Guardar los cambios
            $publicacion->save();
            return redirect()->back();
        }
        else{
            return redirect('/');
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function physicalDestroy(string $id)
    {
        if (Auth::check()){
            //
            $publicacion = Publicaciones::findOrFail($id);
            if (Storage::exists('/public' . $publicacion->contenido)) {
                Storage::delete('/public' . $publicacion->contenido);
            }

            //Eliminar publicación
            $publicacion->delete();

            return redirect()->back();
        }
        else {

        }
    }

    // Definición de la relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    //Borrado lógico de taller, desactiva la publicacion 
    public function offStatus(Request $request, $id)
    {
        if (Auth::check()){
            $publicacion = Publicaciones::findOrFail($id);
            $publicacion->estatus = false; // Cambia el estado a false
            $publicacion->save();
        
            return redirect()->back();
        }
    }

    //Activacion de publicacion en caso de que este desactivada
    public function onStatus(Request $request, $id)
    {
        if (Auth::check()){
            $publicacion = Publicaciones::findOrFail($id);
            $publicacion->estatus = true; // Cambia el estado a false
            $publicacion->save();
        
            return redirect()->back();
        }
    }
    
}
