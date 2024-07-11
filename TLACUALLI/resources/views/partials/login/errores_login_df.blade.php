@if($errors->first('_ca_fiscal')||$errors->first('_ni_fiscal')||$errors->first('_cp_fiscal')||$errors->first('_edo_fiscal')||$errors->first('_ne_fiscal')||$errors->first('_col_fiscal')||$errors->first('_mun_fiscal'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Para guardar una dirección fiscal, todos los campos son requeridos.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
