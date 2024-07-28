
<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_producto{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form method="POST" action="producto/{{$item->id}}/agregar">
          @csrf
          {!! method_field('PUT')!!}
          <div class="mb-3">
            <label class="form-label">Nombre producto</label>
            <input type="text" class="form-control" name="producto" value="{{ $item->producto }}">
            <p class="text-decoration-line-through">{{ $errors->first('producto')}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Proveedor</label>
            <input type="text" class="form-control" name="proveedor" value="{{ $item->proveedor }}">
            <p class="text-decoration-line-through">{{ $errors->first('proveedor')}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="{{ $item->descripcion }}">
            <p class="text-decoration-line-through">{{ $errors->first('descripcion')}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Costo</label>
            <input type="text" class="form-control" name="costo" value="{{ $item->costo }}">
            <p class="text-decoration-line-through">{{ $errors->first('costo')}}</p>
          </div>
          <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="text" class="form-control" name="stock" value="{{ $item->stock }}">
            <p class="text-decoration-line-through">{{ $errors->first('stock')}}</p>
          </div>
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success"><i class="bi bi-bag-check"></i> Agregar</button>
          <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>

