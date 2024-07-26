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
        }
        else {
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

        if (Auth::check() and $idRol == 8){
            //Obtiene todos los talleres relacionados a este usuario
            $productos = Producto::where('proveedor_id', $usuarioId)
            ->with('usuario')
            ->get();
            
            //Envia talleres a la vista de talleres
            return view('mis_productos', compact('productos'));
        }
        else{
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

        if(Auth::check()){
            $validator = $request->validate([
                'np'    => 'required',
                ''
            ]);
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
    public function update(Request $request, Producto $producto)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        $producto->update($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto editado correctamente!');
    }

    public function destroy($id)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado de manera exitosa');
    }
}
