@extends('layouts.template')
@section('titulo','Perfil de Usuario')
@section('contenido')

<div class="container-sm mt-5">
      <form method="POST" action="/registrar">
        @csrf  
      <div class="row">
    <div class="d-flex align-items-center">
        <h2 class="mr-3">Datos Personales</h2>
        <div class="flex-grow-1 border-top border-secondary" style="margin-left: 20px;"></div>
    </div>
    <!-- PRIMERA COLUMNA -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="_nu" name="_nu" value="{{ old('_nu') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_nu') }}</p>
        </div>
         <div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="_fn" name="_fn" value="{{ old('_fn') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_fn') }}</p>
        </div>
        <div class="mb-3" id="apellido_p">
            <label class="form-label">Apellido paterno</label>
            <input type="text" class="form-control" id="_ap" name="_ap" value="{{ old('_ap') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_ap') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <input type="email" class="form-control" id="_email" name="_email" value="{{ old('_email') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_email') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Avatar</label>
            <input type="file" class="form-control" id="_av" name="_av" disabled>
            <p class="text-danger fst-italic">{{ $errors->first('_av') }}</p>
        </div>
       
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="_tel" name="_tel" value="{{ old('_tel') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_tel') }}</p>
        </div>
    </div> <!-- div final de la primera columna -->

    <!-- SEGUNDA COLUMNA -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select class="form-select" id="_rol" name="_rol" onchange="toggleApellidos(this)">
                <option value="" @if (null == old('_rol')) selected @endif>Selecciona una opción</option>
                @foreach($roles as $_rol)
                <option value="{{$_rol->id}}" @if ($_rol->id == old('_rol')) selected @endif>{{$_rol->nombre}}</option>
                @endforeach
            </select>
            <p class="text-danger fst-italic">{{ $errors->first('_rol') }}</p>
        </div>
        
        <div class="mb-3" id="apellido_m">
            <label class="form-label">Apellido materno</label>
            <input type="text" class="form-control" id="_am" name="_am" value="{{ old('_am') }}">
            <p class="text-danger fst-italic">{{ $errors->first('_am') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="_pd" name="_pd">
            <p class="text-danger fst-italic">{{ $errors->first('_pd') }}</p>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" id="_pdc" name="_pdc">
            <p class="text-danger fst-italic">{{ $errors->first('_pdc') }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Sexo</label>
            <select class="form-select" id="_sx" name="_sx">
                <option value="" @if (null == old('_sx')) selected @endif>Selecciona una opción</option>
                @foreach($sexos as $_sx)
                <option value="{{$_sx->id}}" @if ($_sx->id == old('_sx')) selected @endif>{{$_sx->nombre}}</option>
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

  <!-- Datos de dirección -->
  <div class="row">
    <div class="d-flex align-items-center">
            <h2 class="mr-3">Dirección Personal</h2>
            <div class="flex-grow-1 border-top border-secondary" style="margin-left: 20px;"></div>
    </div>
    @include('partials.login.errores_login_d')
    <div class="col-md-6">
      <div class="mb-3">
        <label class="form-label">Calle</label>
        <input type="text" class="form-control" id="_ca" name="_ca" value="{{ old('_ca') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Número interno</label>
        <input type="text" class="form-control" id="_ni" name="_ni" value="{{ old('_ni') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Código Postal</label>
        <input type="text" class="form-control" id="_cp" name="_cp" value="{{ old('_cp') }}">
      </div>
      <div class="mb-3">
        <label class="form-label">Estado</label>
        <select  class="form-select" id="_edo" name="_edo">
          <option value="" @if (null == old('_edo')) selected @endif>Selecciona una opción</option>
                @foreach($estados as $_edo)
                <option value="{{$_edo->id}}" @if ($_edo->id == old('_edo')) selected @endif>{{$_edo->nombre}}</option>
                @endforeach
        </select>
      </div>
    </div>
      <div class="col-md-6">
        <div class="mb-3">
        <label class="form-label">Número externo</label>
        <input type="text" class="form-control" id="_ne" name="_ne" value="{{ old('_ne') }}">
        </div>
        <div class="mb-3">
        <label class="form-label">Colonia</label>
        <input type="text" class="form-control" id="_col" name="_col" value="{{ old('_col') }}">
        </div>
        <div class="mb-3">
        <label class="form-label">Municipio</label>
        <input type="text" class="form-control" id="_mun" name="_mun" value="{{ old('_mun') }}">
        </div>
      </div>
      
  </div>

  <div class="row">
            <div class="d-flex align-items-center">
                <h2 class="mr-3">Dirección Fiscal</h2>
                <div class="flex-grow-1 border-top border-secondary" style="margin-left: 20px;"></div>
            </div>
            @include('partials.login.errores_login_df')
            <div class="col-md-12">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="copy_address" name="copy_address" value="1">
                    <label class="form-check-label" for="copy_address">
                        Usar la misma dirección personal
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_ca_fiscal">Calle</label>
                    <input type="text" class="form-control" id="_ca_fiscal" name="_ca_fiscal" value="{{ old('_ca_fiscal') }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_ni_fiscal">Número interno</label>
                    <input type="text" class="form-control" id="_ni_fiscal" name="_ni_fiscal" value="{{ old('_ni_fiscal') }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_cp_fiscal">Código Postal</label>
                    <input type="text" class="form-control" id="_cp_fiscal" name="_cp_fiscal" value="{{ old('_cp_fiscal') }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_edo_fiscal">Estado</label>
                    <select class="form-select" id="_edo_fiscal" name="_edo_fiscal">
                        <option value="" @if (null == old('_edo_fiscal')) selected @endif>Selecciona una opción</option>
                @foreach($estados as $_edo_fiscal)
                <option value="{{$_edo_fiscal->id}}" @if ($_edo_fiscal->id == old('_edo_fiscal')) selected @endif>{{$_edo_fiscal->nombre}}</option>
                @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_ne_fiscal">Número externo</label>
                    <input type="text" class="form-control" id="_ne_fiscal" name="_ne_fiscal" value="{{ old('_ne_fiscal') }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_col_fiscal">Colonia</label>
                    <input type="text" class="form-control" id="_col_fiscal" name="_col_fiscal" value="{{ old('_col_fiscal') }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="form-label" for="_mun_fiscal">Municipio</label>
                    <input type="text" class="form-control" id="_mun_fiscal" name="_mun_fiscal" value="{{ old('_mun_fiscal') }}">
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Aceptar</button>
        <a href="/"><button type="button" class="btn btn-secondary">Cancelar</button></a>
    </form>
</div>

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