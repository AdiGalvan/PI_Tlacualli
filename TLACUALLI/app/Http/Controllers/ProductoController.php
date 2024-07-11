<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\ProductoRequest;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        Producto::create($request->validated());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function Cards()
    {
        $productos = Producto::all();
        return view('producto.productosCards', compact('productos'));
    }
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
        if (!session()->has('id_usuario')) {
            return redirect('/');
        }
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto)
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
