@extends('layouts.template')
@section('titulo','Servicios')
@section('contenido')

<div class="container mt-5 col-md-6">
  <div class="card">
    <div class="card-body">
      <center><h3 class="card-title">Solicitud de servicio</h3></center>
      <form method="" action="">
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre">
        </div>

        <div class="mb-3">
          <label class="form-label">Proveedor</label>
          <select class="form-select" id="proveedor" name="proveedor">
            <option value="Hagamos Composta">Hagamos Composta</option>
            <option value="Colectivo Nanakatl">Colectivo Nanakatl</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Descripción</label>
          <textarea class="form-control" id="descripcion" name="descripcion" rows="2"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Tipo de publicación</label>
          <select class="form-select" id="tipo_publicacion" name="tipo_publicacion">
            <option value="Académica">Académica</option>
            <option value="Taller">Taller</option>
            <option value="Servicio">Servicio</option>
            <option value="Anuncios">Anuncios</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Tipo de solicitud</label>
          <select class="form-select" id="tipo_solicitud" name="tipo_solicitud">
            <option value="Taller">Taller</option>
            <option value="Servicio">Servicio</option>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Fecha</label>
          <input type="date" class="form-control" id="fecha" name="fecha">
        </div>

        <div class="mb-3">
          <label class="form-label">Estatus</label>
          <select class="form-select" id="estatus" name="estatus">
            <option value="1">1</option>
          </select>
        </div>

       
        <div class="d-flex justify-content-end mt-3">
          <button type="submit" class="btn btn-success me-2">Aceptar</button>
          <a href="/" class="btn btn-secondary">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
