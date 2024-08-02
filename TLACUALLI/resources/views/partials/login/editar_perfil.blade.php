@extends('layouts.template')
@section('titulo','Perfil de Usuario')
@section('contenido')
<div class="container-sm mt-5 bg-white rounded-lg shadow-lg pb-4 pt-2 ps-3 pr-2">
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
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Nombre *</label>
            <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_nu" name="_nu" value="{{ $usuario -> nombre }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_nu') }}</p>
        </div>
        <div class="mb-3" id="apellido_p">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Apellido paterno</label>
            <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ap" name="_ap" value="{{ $usuario -> apellido_paterno }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_ap') }}</p>
        </div>
         <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Fecha de nacimiento *</label>
            <input type="date" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_fn" name="_fn" value="{{ $usuario -> fecha_nacimiento }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_fn') }}</p>
        </div>
        <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Correo *</label>
            <input type="email" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_email" name="_email" value="{{ $usuario -> correo }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_email') }}</p>
        </div>
        <div class="mb-3" hidden>
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Avatar</label>
            <input type="file" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_av" name="_av" disabled>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_av') }}</p>
        </div>
       
        <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Teléfono</label>
            <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_tel" name="_tel" value="{{ $usuario -> telefono }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_tel') }}</p>
        </div>
    </div> <!-- div final de la primera columna -->

    <!-- SEGUNDA COLUMNA -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Rol *</label>
            <select class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_rol" name="_rol" onchange="toggleApellidos(this)">
                <option value="" @if (null == old('_rol')) selected @endif>Selecciona una opción</option>
                @foreach($roles as $_rol)
                <option value="{{$_rol->id}}" @if ($_rol->id == $usuario -> id_rol ) selected @endif>{{$_rol->nombre}}</option>
                @endforeach
            </select>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_rol') }}</p>
        </div>
        
        <div class="mb-3" id="apellido_m">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Apellido materno</label>
            <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_am" name="_am" value="{{ $usuario -> apellido_materno }}">
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_am') }}</p>
        </div>
        <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">Sexo *</label>
            <select class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_sx" name="_sx">
                <option value="" @if (null == old('_sx')) selected @endif>Selecciona una opción</option>
                @foreach($sexos as $_sx)
                <option value="{{$_sx->id}}" @if ($_sx->id == $usuario->id_sexo) selected @endif>{{$_sx->nombre}}</option>
                @endforeach
            </select>
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_sx') }}</p>
        </div>
        <div class="mb-3">
            <label class="text-green-900 font-sans font-bold pb-2 text-lg">RFC</label>
            <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_rfc" name="_rfc" value="{{ $usuario -> RFC }}"> 
            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_rfc') }}</p>
        </div>
    </div> <!-- div final de la segunda columna -->
</div>
            </div>
            <div class="tab-pane fade" id="direccion-personal" role="tabpanel" aria-labelledby="direccion-personal-tab">
                <!-- Dirección Personal -->
                <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Calle</label>
        <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ca" name="_ca" value="{{ !empty($usuario->direccion->calle->nombre) ? $usuario->direccion->calle->nombre : '' }}">
      </div>
      <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Número interno</label>
        <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ni" name="_ni" value="{{ !empty($usuario->direccion->num_int) ? $usuario->direccion->num_int : '' }}">
      </div>
      <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Código Postal</label>
        <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_cp" name="_cp" value="{{ !empty($usuario->direccion->calle->colonia->CP) ? $usuario->direccion->calle->colonia->CP : '' }}">
      </div>
      <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Estado</label>
        <select class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_edo" name="_edo">
            <option value="" @if (is_null(old('_edo', $usuario->direccion->calle->colonia->municipio->estado->id ?? null))) selected @endif>Selecciona una opción</option>
            @foreach($estados as $_edo)
                <option value="{{ $_edo->id }}" @if ($_edo->id == ($usuario->direccion->calle->colonia->municipio->estado->id ?? '')) selected @endif>{{ $_edo->nombre }}</option>
            @endforeach
        </select>
      </div>
    </div>
      <div class="col-md-6">
        <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Número externo</label>
        <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ne" name="_ne" value="{{ !empty($usuario->direccion->num_ext) ? $usuario->direccion->num_ext : '' }}">
        </div>
        <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Colonia</label>
        <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_col" name="_col" value="{{ !empty($usuario->direccion->calle->colonia->nombre) ? $usuario->direccion->calle->colonia->nombre : '' }}">
        </div>
        <div class="mb-3">
        <label class="text-green-900 font-sans font-bold pb-2 text-lg">Municipio</label>
        <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_mun" name="_mun" value="{{ !empty($usuario->direccion->calle->colonia->municipio->nombre) ? $usuario->direccion->calle->colonia->municipio->nombre : '' }}">
        </div>
      </div>
      
  </div>
            </div>
            <div class="tab-pane fade" id="direccion-fiscal" role="tabpanel" aria-labelledby="direccion-fiscal-tab">
                <!-- Dirección Fiscal -->
                <div class="row">
            <div class="col-md-6">
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_ca_fiscal">Calle</label>
                    <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ca_fiscal" name="_ca_fiscal" value="{{ !empty($usuario->direccionF->calle->nombre) ? $usuario->direccionF->calle->nombre : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_ni_fiscal">Número interno</label>
                    <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ni_fiscal" name="_ni_fiscal" value="{{ !empty($usuario->direccionF->num_int) ? $usuario->direccionF->num_int : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_cp_fiscal">Código Postal</label>
                    <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_cp_fiscal" name="_cp_fiscal" value="{{ !empty($usuario->direccionF->calle->colonia->CP) ? $usuario->direccionF->calle->colonia->CP : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_edo_fiscal">Estado</label>
                    <select class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_edo_fiscal" name="_edo_fiscal">
                        <option value="" @if (is_null(old('_edo', $usuario->direccionF->calle->colonia->municipio->estado->id ?? null))) selected @endif>Selecciona una opción</option>
                        @foreach($estados as $_edo)
                            <option value="{{ $_edo->id }}" @if ($_edo->id == ($usuario->direccionF->calle->colonia->municipio->estado->id ?? '')) selected @endif>{{ $_edo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_ne_fiscal">Número externo</label>
                    <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_ne_fiscal" name="_ne_fiscal" value="{{ !empty($usuario->direccionF->num_ext) ? $usuario->direccionF->num_ext : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_col_fiscal">Colonia</label>
                    <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_col_fiscal" name="_col_fiscal" value="{{ !empty($usuario->direccionF->calle->colonia->nombre) ? $usuario->direccionF->calle->colonia->nombre : '' }}">
                </div>
                <div class="mb-3 fiscal-field">
                    <label class="text-green-900 font-sans font-bold pb-2 text-lg" for="_mun_fiscal">Municipio</label>
                    <input type="text" class="font-sans font-light text-base px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 w-full" id="_mun_fiscal" name="_mun_fiscal" value="{{ !empty($usuario->direccionF->calle->colonia->municipio->nombre) ? $usuario->direccionF->calle->colonia->municipio->nombre : '' }}">
                </div>
            </div>
        </div>
            </div>
        </div>

        <div class="flex justify-end pr-4">
        <button type="submit" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Aceptar</button>
        <a href="/perfil" class="bg-gradient-to-r from-gray-500 to-gray-800 hover:from-gray-600 hover:to-gray-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans">Cancelar</a>
        </div>
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

@endsection
