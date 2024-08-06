<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Usuarios;
use Illuminate\Http\Request;

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
            ->get();

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
                ->get();
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
                    '_contP'    => 'required|file|max:2048',
                ],
                [
                    '_np' => 'El campo de nombre es obligatorio',
                    '_descP' => 'El campo de descripción es obligatorio',
                    '_costoP' => 'El campo de costo es obligatorio',
                    '_stockP' => 'El campo de stock es obligatorio',
                    '_contP' => 'El campo de imagen es obligatorio',

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

            if ($request->hasFile('_contP')) {
                $file = $request->file('_contP');
                $filename = $usuarioId . 'imagenproducto' . $producto->id . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads', $filename, 'public');

                // Actualizar la publicación con la ruta del archivo
                $producto->contenido = $filePath;
                $producto->save();
            } else {
                // Si falla la subida, eliminar la publicación creada
                $producto->delete();
                return redirect()->back()->with('success', 'Error al subir el producto.');
            }

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
            // Busca y valida los datos y existencia de dicho producto
            $producto = Producto::findOrFail($id);

            // Validaciones
            $validator = $request->validate([
                '_np'       => 'required',
                '_descP'    => 'required',
                '_costoP'   => 'required|numeric',
                '_stockP'   => 'required|numeric',
            ]);

            // Actualización de campos
            $producto->nombre = $validator['_np'];
            $producto->descripcion = $validator['_descP'];
            $producto->costo = $validator['_costoP'];
            $producto->stock = $validator['_stockP'];

            if ($request->hasFile('_contP')) {
                $file = $request->file('_contP');
                $filename = $usuarioId . 'imagenproducto' . $producto->id . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads', $filename, 'public');

                // Actualizar la publicación con la ruta del archivo
                $producto->contenido = $filePath;
                $producto->save();
            } else {
                $usuario = Usuarios::with('productos')
                    ->find($usuarioId);
                $imagen = $usuario->productos->contenido;
                // Mantener la imagen existente si no se sube una nueva
                $producto->contenido = $imagen;
                // dd($producto);
                $producto->save();
            }
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
