@extends('layouts.template')
@section('titulo','Perfil de Usuario')
@section('contenido')
<div class="container-sm mt-5 bg-white rounded-lg pt-3 pb-4 shadow-lg">
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
            <li class="ml-auto">
                <div class="flex justify-end">
                <a href="/perfil/editar" class="bg-gradient-to-r from-yellow-500 to-yellow-700 hover:from-yellow-600 hover:to-yellow-700 text-white px-4 py-2 rounded-lg mr-2 font-semibold">Editar Información</a>
                </div>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content ps-10 pb-6" id="myTabContent">
            <div class="tab-pane fade show active" id="datos-personales" role="tabpanel" aria-labelledby="datos-personales-tab">
                <!-- Datos Personales -->
                <div class="row">
                    <!-- PRIMERA COLUMNA -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Nombre </label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->nombre }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_nu') }}</p>
                        </div>
                        <div class="mb-3" id="apellido_p">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Apellido paterno</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->apellido_paterno }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_ap') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Fecha de nacimiento </label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->fecha_nacimiento }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_fn') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Correo </label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->correo }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_email') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Teléfono</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->telefono }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_tel') }}</p>
                        </div>
                    </div> <!-- div final de la primera columna -->

                    <!-- SEGUNDA COLUMNA -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Rol </label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->roles->nombre }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_rol') }}</p>
                        </div>
                        <div class="mb-3" id="apellido_m">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Apellido materno</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->apellido_materno }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_am') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Sexo </label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->sexos->nombre }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_sx') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">RFC</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ $usuario->RFC }}</p>
                            <p class="text-red-600 font-sans font-bold mt-1">{{ $errors->first('_rfc') }}</p>
                        </div>
                    </div> <!-- div final de la segunda columna -->
                </div>
            </div>
            <div class="tab-pane fade" id="direccion-personal" role="tabpanel" aria-labelledby="direccion-personal-tab">
                <!-- Dirección Personal -->
                <div class="row">
                    @include('partials.login.errores_login_d')
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Calle</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->calle->nombre) ? $usuario->direccion->calle->nombre : '' }}</p>
                            {{-- @dd($usuario) --}}
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Número interior</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->num_int ) ?  $usuario->direccion->num_int  : '' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Código Postal</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->calle->colonia->CP) ? $usuario->direccion->calle->colonia->CP : '' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Estado</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->calle->colonia->municipio->estado->nombre) ? $usuario->direccion->calle->colonia->municipio->estado->nombre : '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Número exterior</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->num_ext) ? $usuario->direccion->num_ext : '' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Colonia</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->calle->colonia->nombre) ? $usuario->direccion->calle->colonia->nombre : '' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm">Municipio</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccion->calle->colonia->municipio->nombre) ? $usuario->direccion->calle->colonia->municipio->nombre : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="direccion-fiscal" role="tabpanel" aria-labelledby="direccion-fiscal-tab">
                <!-- Dirección Fiscal -->
                <div class="row">
                    @include('partials.login.errores_login_df')
                    <div class="col-md-12">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 fiscal-field">
                            
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_ca_fiscal">Calle</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->calle->nombre) ? $usuario->direccionF->calle->nombre : '' }}</p>
                        </div>
                        <div class="mb-3 fiscal-field">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_ni_fiscal">Número interior</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->num_int ) ?  $usuario->direccionF->num_int  : '' }}</p>
                        </div>
                        <div class="mb-3 fiscal-field">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_cp_fiscal">Código Postal</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->calle->colonia->CP) ? $usuario->direccionF->calle->colonia->CP : '' }}</p>
                        </div>
                        <div class="mb-3 fiscal-field">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_edo_fiscal">Estado</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->calle->colonia->municipio->estado->nombre) ? $usuario->direccionF->calle->colonia->municipio->estado->nombre : '' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 fiscal-field">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_ne_fiscal">Número externo</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->num_ext) ? $usuario->direccionF->num_ext : '' }}</p>
                        </div>
                        <div class="mb-3 fiscal-field">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_col_fiscal">Colonia</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->calle->colonia->nombre) ? $usuario->direccionF->calle->colonia->nombre : '' }}</p>
                        </div>
                        <div class="mb-3 fiscal-field">
                            <label class="text-green-900 font-sans font-bold pb-2 text-sm" for="_mun_fiscal">Municipio</label>
                            <p class="border-b border-gray-600 pb-2 font-sans font-light" >{{ !empty($usuario->direccionF->calle->colonia->municipio->nombre) ? $usuario->direccionF->calle->colonia->municipio->nombre : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-start ps-10">
        <button type="button" class="bg-gradient-to-r from-green-500 to-green-800 hover:from-green-600 hover:to-green-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-toggle="modal" data-bs-target="#cambio_contraseña">Cambiar contraseña</button>
        <button type="button" class="bg-gradient-to-r from-red-500 to-red-800 hover:from-red-600 hover:to-red-800 text-white px-4 py-2 rounded-lg mr-2 font-semibold font-sans" data-bs-toggle="modal" data-bs-target="#eliminar_perfil">Eliminar cuenta</button>
        </div>

        @include('partials.login.modales_login')

</div>
{{-- @dd($usuario) --}}

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
            document.getElementById('_ca_fiscal').innerText = document.getElementById('_ca').value;
            document.getElementById('_ni_fiscal').innerText = document.getElementById('_ni').value;
            document.getElementById('_cp_fiscal').innerText = document.getElementById('_cp').value;
            document.getElementById('_edo_fiscal').innerText = document.getElementById('_edo').value;
            document.getElementById('_ne_fiscal').innerText = document.getElementById('_ne').value;
            document.getElementById('_col_fiscal').innerText = document.getElementById('_col').value;
            document.getElementById('_mun_fiscal').innerText = document.getElementById('_mun').value;
            fiscalFields.forEach(function(field) {
                field.style.display = 'none';
            });
        } else {
            fiscalFields.forEach(function(field) {
                field.style.display = 'block';
                field.querySelector('span').innerText = '';
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