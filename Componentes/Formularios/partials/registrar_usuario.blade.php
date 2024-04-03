<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->


<!-- INICIO MODAL -->
<div class="modal fade" id="registrar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar nuevo usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<!-- INICIO BODY MODAL -->
      <div class="modal-body">
      <form method="" action="">  
      <div class="row">
  <!-- PRIMERA COLUMNA -->
  <div class="col-md-6">
    <div class="mb-3">
      <label class="form-label">Nombre</label>
      <input type="text" class="form-control" id="_nu" name="_nu">
    </div>

    <div class="mb-3">
      <label class="form-label">Apellido paterno</label>
      <input type="text" class="form-control" id="_ap" name="_ap">
    </div>

    <div class="mb-3">
      <label class="form-label">Apellido materno</label>
      <input type="text" class="form-control" id="_am" name="_am">
    </div>

    <div class="mb-3">
      <label class="form-label">Rol</label>
      <select class="form-select" id="_rol" name="_rol">
        <option value="">Persona física</option>
        <option value="">Persona moral</option>
        <option value="">Tallerista</option>
        <option value="">Blogger</option>
      </select>
    </div> 

    <div class="mb-3">
      <label class="form-label">Correo</label>
      <input type="email" class="form-control" id="_email" name="_email">
    </div>

    <div class="mb-3">
      <label class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="_pd" name="_pd">
    </div>

    <div class="mb-3">
      <label class="form-label">Avatar</label>
      <input type="file" class="form-control" id="_av" name="_av">
    </div>

    <div class="mb-3">
      <label class="form-label">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="_fn" name="_fn">
    </div>

    <div class="mb-3">
      <label class="form-label">Sexo</label>
      <select class="form-select" id="_sx" name="_sx">
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>
        <option value="otro">Prefiero no decirlo</option>
      </select>
    </div> 


  </div> <!-- div final de la primera columna -->

  <!-- SEGUNDA COLUMNA -->
  <div class="col-md-6">
    

    <div class="mb-3">
      <label class="form-label">Calle</label>
      <input type="text" class="form-control" id="_ca" name="_ca">
    </div>

    <div class="mb-3">
      <label class="form-label">Número externo</label>
      <input type="text" class="form-control" id="_ne" name="_ne">
    </div>

    <div class="mb-3">
      <label class="form-label">Número interno</label>
      <input type="text" class="form-control" id="_ni" name="_ni">
    </div>

    <div class="mb-3">
      <label class="form-label">Colonia</label>
      <input type="text" class="form-control" id="_col" name="_col">
    </div>

    <div class="mb-3">
      <label class="form-label">Código Postal</label>
      <input type="text" class="form-control" id="_cp" name="_cp">
    </div>

    <div class="mb-3">
      <label class="form-label">Municipio</label>
      <input type="text" class="form-control" id="_mun" name="_mun">
    </div>

    <div class="mb-3">
      <label class="form-label">Estado</label>
      <select  class="form-select" id="_edo" name="_edo">
      <option value="">Aguascalientes</option>
        <option value="">Baja California</option>
        <option value=""> Baja California Sur</option>
        <option value=""> Campeche </option>
        <option value=""> Chiapas </option>
        <option value=""> Chihuahua</option>
        <option value=""> Ciudad de México</option>
        <option value=""> Coahuila</option>
        <option value=""> Colima</option>
        <option value=""> Durango</option>
        <option value=""> Estado de México</option>
        <option value=""> Guanajuato</option>
        <option value=""> Guerrero</option>
        <option value=""> Hidalgo</option>
        <option value=""> Jalisco</option>
        <option value=""> Michoacán</option>
        <option value=""> Morelos</option>
        <option value=""> Nayarit</option>
        <option value=""> Nuevo León</option>
        <option value=""> Oaxaca</option>
        <option value=""> Puebla</option>
        <option value=""> Querétaro</option>
        <option value=""> Quintana Roo</option>
        <option value=""> San Luis Potosí</option>
        <option value=""> Sinaloa</option>
        <option value=""> Sonora</option>
        <option value=""> Tabasco</option>
        <option value=""> Tamaulipas</option>
        <option value=""> Tlaxcala</option>
        <option value=""> Veracruz</option>
        <option value=""> Yucatán</option>
        <option value=""> Zacatecas</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Teléfono</label>
      <input type="text" class="form-control" id="_tel" name="_tel">
    </div>
  </div>
</div>

</form>
<!-- FIN BODY MODAL -->
      
      <!-- INICIO FOOTER MODAL -->
      <div class="modal-footer">
      <button type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
       </div>
      <!-- FIN FOOTER MODAL -->


    </div>
  </div>
</div>