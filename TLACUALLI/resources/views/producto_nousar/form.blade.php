
<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label"></label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label"></label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $producto?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="costo" class="form-label"></label>
            <input type="text" name="costo" class="form-control @error('costo') is-invalid @enderror" value="{{ old('costo', $producto?->costo) }}" id="costo" placeholder="Costo">
            {!! $errors->first('costo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stock') }}</label>
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $producto?->stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>  
        @if(session()->has('id_usuario'))
        <div class="form-group mb-2 mb20" hidden>
            <label for="proveedor_id" class="form-label">{{ __('Proveedor Id') }}</label>
            <input type="text" name="proveedor_id" class="form-control @error('proveedor_id') is-invalid @enderror" value="{{ session('id_usuario') }}" id="proveedor_id" placeholder="Proveedor Id">
            {!! $errors->first('proveedor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @endif

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-bag-check"></i>Agregar</button>
    </div>
</div>