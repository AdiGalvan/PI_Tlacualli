<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
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

        $productos = Producto::where('estatus', 1)
            ->paginate(6);

        return view('productos', compact('productos', 'usuario'));
        // $productos = Producto::paginate();

        // return view('producto.index', compact('productos'))
        //     ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());


    }

    public function misProductosIndex()
    {
        $usuarioId = Auth::id();
        $usuario = Usuarios::with('roles')
            ->find($usuarioId);
        $idRol = $usuario->roles->id;

        if (Auth::check() and ($idRol == 3 || $idRol == 4 || $idRol == 7)) {
            //Obtiene todos los talleres relacionados a este usuario
            $productos = Producto::where('proveedor_id', $usuarioId)
                ->with('usuario')
                ->paginate(8);
            //Envia talleres a la vista de talleres
            return view('mis_productos', compact('productos'));
        } else {
            //Si no esta autenticado lo manda al home
            abort(404, 'Página no encontrada');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // $producto = new Producto();
        // return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $validator = $request->validate(
                [
                    '_np'       => 'required',
                    '_descP'    => 'required',
                    '_costoP'   => 'required|numeric',
                    '_stockP'   => 'required|numeric',
                    '_contP.*'  => 'required|file|max:2048',
                ],
                [
                    '_np.required' => 'El campo de nombre es obligatorio',
                    '_descP.required' => 'El campo de descripción es obligatorio',
                    '_costoP.required' => 'El campo de costo es obligatorio',
                    '_stockP.required' => 'El campo de stock es obligatorio',
                    '_contP.required' => 'El campo de imagen es obligatorio',
                    '_contP.*.file' => 'Cada archivo debe ser una imagen',
                    '_contP.*.max' => 'Cada imagen no debe exceder los 2MB',
                ]
            );

            // Insert de productos
            $producto = new Producto();
            $producto->nombre = $validator['_np'];
            $producto->descripcion = $validator['_descP'];
            $producto->costo = $validator['_costoP'];
            $producto->stock = $validator['_stockP'];
            $producto->estatus = 1;
            $producto->proveedor_id = $usuarioId;
            $producto->contenido = '';
            $producto->save();

            $rutasImagenes = [];

            if ($request->hasFile('_contP')) {
                $files = $request->file('_contP');
                $counter = 1;
                foreach ($files as $file) {
                    $filename = $usuarioId . 'imagenproducto' . $producto->id . '_' . $counter . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('uploads', $filename, 'public');
                    $rutasImagenes[] = $filePath;
                    $counter++;
                }
            } else {
                // Si falla la subida, eliminar el producto creado
                $producto->delete();
                return redirect()->back()->with('error', 'Error al subir las imágenes del producto.');
            }

            // Guardar las rutas de las imágenes como JSON en el campo contenido
            $producto->contenido = json_encode($rutasImagenes);
            $producto->save();

            return redirect()->back()->with('success', 'Producto creado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    /**
     * Display the specified resource.
     */
    // public function Cards()
    // {
    //     $productos = Producto::all();
    //     return view('producto.productosCards', compact('productos'));
    // }
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuarioId = Auth::id();

        if (Auth::check()) {
            $producto = Producto::findOrFail($id);

            $validator = $request->validate([
                '_np'       => 'required',
                '_descP'    => 'required',
                '_costoP'   => 'required|numeric',
                '_stockP'   => 'required|numeric',
            ]);

            $producto->nombre = $validator['_np'];
            $producto->descripcion = $validator['_descP'];
            $producto->costo = $validator['_costoP'];
            $producto->stock = $validator['_stockP'];

            // Manejo de eliminación de imágenes
            if ($request->has('eliminarImagenes')) {
                $imagenesAEliminar = $request->input('eliminarImagenes');
                $contenidoExistente = json_decode($producto->contenido, true);

                foreach ($imagenesAEliminar as $imagen) {
                    if (($clave = array_search($imagen, $contenidoExistente)) !== false) {
                        unset($contenidoExistente[$clave]);
                        // Eliminar la imagen del almacenamiento
                        if (empty($contenidoExistente)) {
                            return redirect()->back()->withErrors(['_contP' => 'El producto debe tener al menos una imagen.']);
                        }
                        if (Storage::disk('public')->exists($imagen)) {
                            Storage::disk('public')->delete($imagen);
                        }
                    }
                }
                $contenidoExistente = array_values($contenidoExistente);
                $producto->contenido = json_encode($contenidoExistente);
            }

            // Manejo de nuevas imágenes
            if ($request->hasFile('_contP')) {
                $imagenesNuevas = $request->file('_contP');
                $contenidoExistente = json_decode($producto->contenido, true) ?? [];

                foreach ($imagenesNuevas as $imagenNueva) {
                    $filename = $usuarioId . 'imagenproducto' . uniqid() . '.' . $imagenNueva->getClientOriginalExtension();
                    $filePath = $imagenNueva->storeAs('uploads', $filename, 'public');
                    $contenidoExistente[] = $filePath;
                }

                $producto->contenido = json_encode($contenidoExistente);
            }

            // Validación para evitar que el producto se quede sin imágenes
            if (empty(json_decode($producto->contenido))) {
                return redirect()->back()->withErrors(['_contP' => 'El producto debe tener al menos una imagen.']);
            }

            $producto->save();

            return redirect()->back()->with('update', 'Producto actualizado exitosamente.');
        } else {
            abort(404, 'Página no encontrada');
        }
    }

    public function destroy($id)
    {
    }

    public function offStatus($id)
    {
        if (Auth::check()) {
            $producto = Producto::findOrFail($id);
            $producto->estatus = 0;
            $producto->save();

            return redirect()->back()->with('off', 'Producto desactivado exitosamente.');
        } else {
            abort(400, 'Producto no encontrado');
        }
    }

    public function onStatus($id)
    {
        if (Auth::check()) {
            $producto = Producto::findOrFail($id);
            $producto->estatus = 1;
            $producto->save();

            return redirect()->back()->with('on', 'Producto activado exitosamente.');
        } else {
            abort(400, 'Producto no encontrado');
        }
    }
}
