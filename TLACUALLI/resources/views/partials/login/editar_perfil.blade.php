@extends('layouts.template')
@section('titulo','Perfil de Usuario')
@section('contenido')

<div class="container-sm mt-5">
    <form method="POST" action="/perfil/editar">
        @csrf
        <!-- Nav tabs -->
        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-uppercase fw-bold bg-success text-light" id="datos-personales-tab" data-bs-toggle="tab" data-bs-target="#datos-personales" type="button" role="tab" aria-controls="datos-personales" aria-selected="true">Datos Personales</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase fw-bold text-muted" id="direccion-personal-tab" data-bs-toggle="tab" data-bs-target="#direccion-personal" type="button" role="tab" aria-controls="direccion-personal" aria-selected="false">Dirección Personal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase fw-bold text-muted" id="direccion-fiscal-tab" data-bs-toggle="tab" data-bs-target="#direccion-fiscal" type="button" role="tab" aria-controls="direccion-fiscal" aria-selected="false">Dirección Fiscal</button>
            </li>
        </ul>
        @include('partials.login.errores_login_d')
        @include('partials.login.errores_login_df')


        <!-- Tab panes -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="datos-personales" role="tabpanel" aria-labelledby="datos-personales-tab">
                <!-- Datos Personales -->
                <div class="row">

    <!-- PRIMERA COLUMNA -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Nombre *</label>
            <input type="text" class="form-control" id="_nu" name="_nu" value="{{ $usuario -> nombre }}">
            <p class="text-danger fst-italic">{{ $errors->first('_nu') }}</p>
        </div>
        <div class="mb-3" id="apellido_p">
            <label class="form-label">Apellido paterno</label>
            <input type="text" class="form-control" id="_ap" name="_ap" value="{{ $usuario -> apellido_paterno }}">
            <p class="text-danger fst-italic">{{ $errors->first('_ap') }}</p>
        </div>
         <div class="mb-3">
            <label class="form-label">Fecha de nacimiento *</label>
            <input type="date" class="form-control" id="_fn" name="_fn" value="{{ $usuario -> fecha_nacimiento }}">
            <p class="text-danger fst-italic">{{ $errors->first('_fn') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo *</label>
            <input type="email" class="form-control" id="_email" name="_email" value="{{ $usuario -> correo }}">
            <p class="text-danger fst-italic">{{ $errors->first('_email') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Avatar</label>
            <input type="file" class="form-control" id="_av" name="_av" disabled>
            <p class="text-danger fst-italic">{{ $errors->first('_av') }}</p>
        </div>
       
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="_tel" name="_tel" value="{{ $usuario -> telefono }}">
            <p class="text-danger fst-italic">{{ $errors->first('_tel') }}</p>
        </div>
    </div> <!-- div final de la primera columna -->

    <!-- SEGUNDA COLUMNA -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Rol *</label>
            <select class="form-select" id="_rol" name="_rol" onchange="toggleApellidos(this)">
                <option value="" @if (null == old('_rol')) selected @endif>Selecciona una opción</option>
                @foreach($roles as $_rol)
                <option value="{{$_rol->id}}" @if ($_rol->id == $usuario -> id_rol ) selected @endif>{{$_rol->nombre}}</option>
                @endforeach
            </select>
            <p class="text-danger fst-italic">{{ $errors->first('_rol') }}</p>
        </div>
        
        <div class="mb-3" id="apellido_m">
            <label class="form-label">Apellido materno</label>
            <input type="text" class="form-control" id="_am" name="_am" value="{{ $usuario -> apellido_materno }}">
            <p class="text-danger fst-italic">{{ $errors->first('_am') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Sexo *</label>
            <select class="form-select" id="_sx" name="_sx">
                <option value="" @if (null == old('_sx')) selected @endif>Selecciona una opción</option>
                @foreach($sexos as $_sx)
                <option value="{{$_sx->id}}" @if ($_sx->id == $usuario -> id_sexo) selected @endif>{{$_sx->nombre}}</option>
                @endforeach
            </select>
            <p class="text-danger fst-italic">{{ $errors->first('_sx') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">RFC</label>
            <input type="text" class="form-control" id="_rfc" name="_rfc" value="{{ old('_rfc') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_rfc') }}</p>
        </div>
    </div> <!-- div final de la segunda columna -->
</div>
            </div>
            <div class="tab-pane fade" id="direccion-personal" role="tabpanel" aria-labelledby="direccion-personal-tab">
                <!-- Dirección Personal -->
                <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Calle</label>
        <input type="text" class="form-control" id="_ca" name="_ca" value="{{ !empty($calle->nombre) ? $calle->nombre : '' }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Número interno</label>
        <input type="text" class="form-control" id="_ni" name="_ni" value="{{ !empty($direccion->num_int) ? $direccion->num_int : '' }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Código Postal</label>
        <input type="text" class="form-control" id="_cp" name="_cp" value="{{ !empty($colonia->CP) ? $colonia->CP : '' }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Estado</label>
        <select  class="form-select" id="_edo" name="_edo">
          <option value="" @if (!empty($municipio)) selected @endif>Selecciona una opción</option>
                @foreach($estados as $_edo)
                <option value="{{$_edo->id}}" @if ($_edo->id ==  (!empty($municipio->id_estado) ? $municipio->id_estado : '' ) ) selected @endif>{{$_edo->nombre}}</option>
                @endforeach
        </select>
      </div>
    </div>
      <div class="col-md-6">
        <div class="mb-3">
        <label class="form-label">Número externo</label>
        <input type="text" class="form-control" id="_ne" name="_ne" value="{{ !empty($direccion->num_ext) ? $direccion->num_ext : '' }}">
        </div>
        <div class="mb-3">
        <label class="form-label">Colonia</label>
        <input type="text" class="form-control" id="_col" name="_col" value="{{ !empty($colonia->nombre) ? $colonia->nombre : '' }}">
        </div>
        <div class="mb-3">
        <label class="form-label">Municipio</label>
        <input type="text" class="form-control" id="_mun" name="_mun" value="{{ !empty($municipio->nombre) ? $municipio->nombre : '' }}">
        </div>
      </div>
      
  </div>
            </div>
            <div class="tab-pane fade" id="direccion-fiscal" role="tabpanel" aria-labelledby="direccion-fiscal-tab">
                <!-- Dirección Fiscal -->
                <div class="row">
            <div class="col-md-6">
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_ca_fiscal">Calle</label>
                    <input type="text" class="form-control" id="_ca_fiscal" name="_ca_fiscal" value="{{ !empty($callef->nombre) ? $callef->nombre : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_ni_fiscal">Número interno</label>
                    <input type="text" class="form-control" id="_ni_fiscal" name="_ni_fiscal" value="{{ !empty($direccionf->num_int) ? $direccionf->num_int : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_cp_fiscal">Código Postal</label>
                    <input type="text" class="form-control" id="_cp_fiscal" name="_cp_fiscal" value="{{ !empty($coloniaf->CP) ? $coloniaf->CP : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_edo_fiscal">Estado</label>
                    <select class="form-select" id="_edo_fiscal" name="_edo_fiscal">
                        <option value="" @if (!empty($municipiof)) selected @endif>Selecciona una opción</option>
                @foreach($estados as $_edo_fiscal)
                <option value="{{$_edo_fiscal->id}}" @if ($_edo_fiscal->id == (!empty($municipiof->id_estado) ? $municipiof->id_estado : '' )) selected @endif>{{$_edo_fiscal->nombre}}</option>
                @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_ne_fiscal">Número externo</label>
                    <input type="text" class="form-control" id="_ne_fiscal" name="_ne_fiscal" value="{{ !empty($direccionf->num_ext) ? $direccionf->num_ext : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_col_fiscal">Colonia</label>
                    <input type="text" class="form-control" id="_col_fiscal" name="_col_fiscal" value="{{ !empty($coloniaf->nombre) ? $coloniaf->nombre : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_mun_fiscal">Municipio</label>
                    <input type="text" class="form-control" id="_mun_fiscal" name="_mun_fiscal" value="{{ !empty($municipiof->nombre) ? $municipiof->nombre : '' }}">
                </div>
            </div>
        </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Aceptar</button>
        <a href="/perfil" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('#myTab .nav-link');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                tabs.forEach(function(tab) {
                    tab.classList.remove('active', 'bg-success', 'text-light');
                    tab.classList.add('text-muted');
                });

                this.classList.add('active', 'bg-success', 'text-light');
                this.classList.remove('text-muted');
            });
        });
    });
</script>
<script>
document.getElementById('copy_address').addEventListener('change', function() {
    var fiscalFields = document.querySelectorAll('.fiscal-field');
    if(this.checked) {
        document.getElementById('_ca_fiscal').value = document.getElementById('_ca').value;
        document.getElementById('_ni_fiscal').value = document.getElementById('_ni').value;
        document.getElementById('_cp_fiscal').value = document.getElementById('_cp').value;
        document.getElementById('_edo_fiscal').value = document.getElementById('_edo').value;
        document.getElementById('_ne_fiscal').value = document.getElementById('_ne').value;
        document.getElementById('_col_fiscal').value = document.getElementById('_col').value;
        document.getElementById('_mun_fiscal').value = document.getElementById('_mun').value;
        fiscalFields.forEach(function(field) {
            field.style.display = 'none';
        });
    } else {
        fiscalFields.forEach(function(field) {
            field.style.display = 'block';
            field.querySelector('input, select').value = '';
        });
    }
});
</script>

<script>
    function toggleApellidos(select) {
        var apellidosDiv1 = document.getElementById('apellido_p');
        var apellidosDiv2 = document.getElementById('apellido_m');
        var rolValue = select.value;

        if (rolValue === '1') {
            apellidosDiv1.style.display = 'block'; // Mostrar los apellidos si es persona física
            apellidosDiv2.style.display = 'block'; // Mostrar los apellidos si es persona física
        } else {
            apellidosDiv1.style.display = 'none'; // Ocultar los apellidos en otros casos
            apellidosDiv2.style.display = 'none'; // Ocultar los apellidos en otros casos
        }
    }
</script>
@endsection