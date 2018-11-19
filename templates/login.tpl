<div class="container-fluid cuerpo-index">
  <div class="row">
    <div class="col-md-4 col-md-offset-4" id="mensajeLogin">
    </div>
    <div class="col-md-4 col-md-offset-4">
      <form class="login" method="post" onsubmit="login(this, event)">
        <div class="form-group" >
          <label for="email">Correo electronico</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su mail" name="mail" required>
          <small id="emailHelp" class="form-text text-muted">No compartiremos su correo electrónico con nadie.</small>
        </div>
        <div class="form-group">
          <label for="password">Clave</label>
          <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" name="clave" required>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-categorias">Ingresar</button>
      </form>
    </div>
  </div>
</div>
