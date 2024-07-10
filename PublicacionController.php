<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidadorPublicacion;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::paginate(10);
        $i = 0;
        return view('partials.publicaciones.index', compact('publicaciones'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publicaciones = new Publicacion();
        return view('partials.publicaciones.create', compact('publicaciones'));
    }


    public function Acordion()
    {
        $publicaciones = Publicacion::paginate();
        return view('partials.publicaciones.publicaciones_acordion', compact('publicaciones'));
    }
    /**
     * Store a newly created resource in storage.
     */
    
    public function store(ValidadorPublicacion $request)
    {
    $validatedData = $request->validate([
        'nombre' => 'required|string|max:255',
        'id_tipo' => 'required|integer',
        'descripcion' => 'required|string',
    ]);

    Publicacion::create($validatedData);

    return redirect()->route('publicaciones.index')->with('success', 'Publicación creada exitosamente.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $publicacion = Publicacion::find($id);
        return view('publicaciones.show', compact('publicaciones'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publicacion = Publicacion::find($id);
        return view('partials.publicaciones.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidadorPublicacion $request, Publicacion $publicacion)
    {
        
        $publicacion->update($request->validated());

        return redirect()->route('publicaciones.publicaciones.index')->with('success', 'Publicación actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Publicacion::find($id)->delete();

        // return redirect()->route('publicacion.index')->with('success', 'Publicación eliminada exitosamente.');
    }
}
