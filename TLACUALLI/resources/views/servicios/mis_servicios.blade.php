@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<p></p>
<center><h1>Mis servicios</h1></center>
<p></p>
<div class="container mt-3 ">
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-success" type="submit">Buscar</button>
      </form>
</div>

<div class="container mt-4 d-flex justify-content-end">
    <a href="{{ route('servicios.create') }}" class="btn btn-warning">Nueva solicitud</a>
</div>


    <body>
      <div class="container mt-3">
      
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Cliente</th>
              <th>Proveedor</th>
              <th>Descripción</th>
              <th>Tipos de servicio</th> <!-- Publicación -->
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
           
            <tr>
              <td>1</td>
              <td>Moser</td>
              <td>Hagamos Composta</td>
              <td>Lorem ipsum</td>
              <td>Solicitud de botes nuevos</td>
              <td>2024-07-17</td>
              
            
              <td>
                <button class="btn btn-primary btn-sm">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
@endsection