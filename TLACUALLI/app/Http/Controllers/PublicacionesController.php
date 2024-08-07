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
    //-----------------------RELACIONES DE MODELOS---------------------------//
    // Definición de la relación con el modelo User
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    //----------------------TALLERES------------------------------------------------//
    /**
     * Display a listing of the resource.
     */
    public function talleresIndex()
    {
        //Verifica si el usuario está autenticado, si está autenticado se le habilita la opcion
        // para ir a sus talleres 
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
        $publicaciones = Publicaciones::where('id_tipo', 2)
            ->where('estatus', true)
            ->whereDate('fecha_revision', '>=', now())
            ->with('usuario')
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        //Envia talleres a la vista de talleres
        return view('talleres', compact('publicaciones', 'usuario'));
    }

    public function misTalleresIndex()
    {
        $usuarioId = Auth::id();
        $usuario = Usuarios::with('roles')->find($usuarioId);
        $idRol = $usuario->roles->id;

        if (Auth::check() && ($idRol == 6 || $idRol == 7)) {
            // Obtiene todos los talleres relacionados a este usuario con paginación
            $publicaciones = Publicaciones::where('id_usuario', $usuarioId)
                ->where('id_tipo', 2)
                ->with('usuario')
                ->orderBy('created_at', 'desc')
                ->paginate(8); // Ajusta el número de elementos por página según sea necesario

            // Envía talleres a la vista de talleres
            return view('mis_talleres', compact('publicaciones'));
        } else {
            // Si no está autenticado lo manda al home
            abort(404, 'Página no encontrada');
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
    public function tallerStore(Request $request)
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            // Validaciones
            $validator = $request->validate(
                [
                    '_descT' => 'required',
                    '_nt' => 'required|max:50',
                    '_contT' => 'required|file|max:2048', // Ruta de la imagen
                    '_costoT' => 'numeric',
                    '_fechaInicioT' => 'required|date',
                ],
                [
                    '_descT.required' => 'El campo de descripción es obligatorio.',
                    '_nt.required' => 'El campo de nombre es obligatorio.',
                    '_contT.required' => 'El campo de archivo es obligatorio.',
                    '_costoT.numeric' => 'El campo de costo debe ser un número.',
                    '_fechaInicioT.required' => 'El campo de fecha de inicio es obligatorio.',
                    '_fechaInicioT.date' => 'El campo de fecha de inicio debe ser una fecha válida.',
                ]
            );

            // Insert de publicación para obtener el ID
            $taller = new Publicaciones();
            $taller->descripcion = $validator['_descT'];
            $taller->nombre = $validator['_nt'];
            $taller->contenido = ''; // Inicializar con una cadena vacía
            $taller->fecha_publicacion = Carbon::now()->toDateString();
            $taller->costo = $validator['_costoT'];
            $taller->fecha_revision = $validator['_fechaInicioT']; // Almacenar la fecha de inicio
            $taller->id_usuario = $usuarioId;
            $taller->id_tipo = 2; // Tipo 2 porque son talleres
            $taller->estatus = true;
            $taller->save();

            // Subir el archivo imagen con el ID de la publicación y la extensión
            if ($request->hasFile('_contT')) {
                $file = $request->file('_contT');
                $filename = $usuarioId . '_2_imagentaller_' . $taller->id . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads', $filename, 'public');

                // Actualizar la publicación con la ruta del archivo
                $taller->contenido = $filePath;
                $taller->save();
            } else {
                // Si falla la subida, eliminar la publicación creada
                $taller->delete();
                return redirect()->back()->with('error', 'Error al subir el archivo.');
            }

            return redirect()->back()->with('success', 'Taller creado exitosamente.');
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
        if (Auth::check()) {
            // Busca todas los datos de dicha publicacion
            $publicacion = Publicaciones::findOrFail($id);

            // Validaciones
            $validator = $request->validate([
                '_descT' => 'required',
                '_nt' => 'required|max:50',
                '_contT' => 'nullable|file|max:2048', // Cambiado a nullable para permitir no cambiar el archivo
                '_costoT' => 'numeric',
                '_fechaInicioT' => 'required|date',
            ]);

            // Actualización de campos
            $publicacion->descripcion = $validator['_descT'];
            $publicacion->nombre = $validator['_nt'];
            $publicacion->costo = $validator['_costoT'];
            $publicacion->fecha_revision = $validator['_fechaInicioT']; // Actualizar la fecha de inicio

            // Subir el archivo si se proporciona uno nuevo
            if ($request->hasFile('_contT')) {
                // Eliminar la imagen anterior si existe
                if ($publicacion->contenido) {
                    Storage::disk('public')->delete($publicacion->contenido);
                }

                $file = $request->file('_contT');
                $filename = $publicacion->id_usuario . '_2_imagentaller_' . $publicacion->id . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads', $filename, 'public');
                $publicacion->contenido = $filePath;
            }

            // Guardar los cambios
            $publicacion->save();

            return redirect()->back()->with('update', 'Taller actualizado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function physicalDestroy(string $id)
    {
        if (Auth::check()) {
            //
            $publicacion = Publicaciones::findOrFail($id);
            if (Storage::exists('/public' . $publicacion->contenido)) {
                Storage::delete('/public' . $publicacion->contenido);
            }

            //Eliminar publicación
            $publicacion->delete();

            return redirect()->back();
        } else {
            abort(404, 'Página no encontrada');
        }
    }


    //Borrado lógico de taller, desactiva la publicacion 
    public function offStatus(Request $request, $id)
    {
        if (Auth::check()) {
            $publicacion = Publicaciones::findOrFail($id);
            $publicacion->estatus = false; // Cambia el estado a false
            $publicacion->save();

            return redirect()->back()->with('off', 'Taller desactivado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    //Activacion de publicacion en caso de que este desactivada
    public function onStatus(Request $request, $id)
    {
        if (Auth::check()) {
            $publicacion = Publicaciones::findOrFail($id);
            $publicacion->estatus = true; // Cambia el estado a false
            $publicacion->save();

            return redirect()->back()->with('on', 'Taller activado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    //--------------------------PUBLICACIONES------------------------------//

    public function publicacionesIndex()
    {
        // Verifica si el usuario está autenticado, si está autenticado se le habilita la opcion
        // para ir a sus talleres 
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $usuario = Usuarios::with('roles')
                ->find($usuarioId);
        } else {
            // Si no está autenticado se crea una clase generica para que pueda visualizar todos los talleres activos
            $usuario = new \stdClass();
            $usuario->roles = new \stdClass();
            $usuario->roles->id = null;
        }

        // Busca todas las publicaciones de tipo taller, activas y con los datos del publicador, con paginación
        $publicaciones = Publicaciones::where('id_tipo', 1)
            ->where('estatus', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(5); // Ajusta el número de elementos por página según sea necesario

        return view('publicaciones', compact('publicaciones', 'usuario'));
    }

    public function misPublicacionesIndex()
    {
        $usuarioId = Auth::id();
        $usuario = Usuarios::with('roles')
            ->find($usuarioId);
        $idRol = $usuario->roles->id;

        if (Auth::check() and ($idRol == 5 || $idRol == 7)) {
            //Obtiene todos los talleres relacionados a este usuario
            $publicaciones = Publicaciones::where('id_usuario', $usuarioId)
                ->where('id_tipo', 1)
                ->with('usuario')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            //Envia talleres a la vista de talleres
            return view('mis_publicaciones', compact('publicaciones'));
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    public function publicacionStore(Request $request)
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            //Validaciones
            $validator = $request->validate(
                [
                    '_des'                  => 'required',
                    '_tp'                   => 'required|max:50',
                    '_cont'                 => 'required|file|max:2048', //Ruta de la imagen
                    '_tipo'                 => 'required|numeric'
                    //'id_usuario_revision'   => 'required',
                    //'fecha_revision'        => 'date',
                ],
                [
                    '_des' => 'El campo de descripción es obligatorio.',
                    '_tp' => 'El campo de título es obligatorio.',
                    '_cont' => 'El campo de archivo es obligatorio.',
                    '_tipo' => 'El campo de tipo es obligatorio.',
                ]
            );

            //Subir el archivo imagen
            if ($request->hasFile('_cont')) {
                $file = $request->file('_cont');

                $filename = $usuarioId . '_1_articulo_' . $validator['_tp'] . '.' . $file->getClientOriginalExtension();

                $filePath = $file->storeAs('uploads', $filename, 'public');
            } else {
                return redirect()->back()->with('error', 'Error al subir el archivo.');
            }

            //Insert de publicación
            $publicacion = new Publicaciones();
            $publicacion->descripcion = $validator['_des'];
            $publicacion->nombre = $validator['_tp'];
            $publicacion->contenido = $filePath;
            $publicacion->fecha_publicacion = Carbon::now()->toDateString();
            $publicacion->id_usuario = $usuarioId;
            $publicacion->id_tipo = $validator['_tipo'];
            $publicacion->estatus = true;
            $publicacion->save();

            return redirect()->back()->with('success', 'Publicación creada exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }
}
