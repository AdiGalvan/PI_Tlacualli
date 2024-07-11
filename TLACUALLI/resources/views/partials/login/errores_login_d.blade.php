@if($errors->first('_ca')||$errors->first('_ni')||$errors->first('_cp')||$errors->first('_edo')||$errors->first('_ne')||$errors->first('_col')||$errors->first('_mun'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Para guardar una dirección personal, todos los campos son requeridos.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
