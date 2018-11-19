<div class="container-fluid cuerpo-index">
  <div class="row">
    <div class="col-md-4 col-md-offset-4" id="mensajeRegistro">
    </div>
    <div class="col-md-4 col-md-offset-4">
      <form class="registro" method="post" onsubmit="crearUser(this, event)">
        <div>
            <label for="name">Ingrese un nombre de usuario</label>
            <input type="text" class="form-control" id="name" placeholder="nombre" name="name" value="" required>
        </div>
        <div class="form-group" >
          <label for="email">Ingrese su correo electronico</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="mail" value="" name="mail" required>
          <small id="emailHelp" class="form-text text-muted">No compartiremos su correo electrónico con nadie.</small>
        </div>
        <div class="form-group">
            <label for="password">Ingrese su contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" value="" name="clave" required>
        </div>
        <div class="form-group">        
            <label for="confirm_password">Confirme su contraseña</label>
            <input type="password" class="form-control" placeholder="Confirme su contraseña" value="" id="confirm_password" name="confirmarClave"required>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-categorias">Ingresar</button>
      </form>
    </div>
  </div>
</div>
