<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  {* <link href="css/bootstrap.min.css" rel="stylesheet"> *}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Coming+Soon|Permanent+Marker" rel="stylesheet">
  <!-- font-family: 'Permanent Marker', cursive;
  font-family: 'Coming Soon', cursive; -->
  <title>The Library</title>
</head>
<body>

  <header>
      
    <!----- nav bar ---->
    <nav class="navbar navbar-default">
    
    {if $isLoggedIn}
      <a href="logout" class="btn btn-login">Sing out</a>
    {else}
      <button type="submit" onclick="navigate('http://localhost/theLibrary/registro')" class="btn btn-register">Registrarse!</button>
      <button type="submit" onclick="navigate('http://localhost/theLibrary/login')" class="btn btn-login">Sing in</button>
    {/if}
    
        
      <div class="container-fluid">
        <div class="navbar-header"><a href="#" onclick="navigate('http://localhost/theLibrary/listaLibros')"class="navbar-brand navbar-link">The Library</a>
          <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav">
            <li role="presentation"><a href="#" onclick="navigate('http://localhost/theLibrary/listaLibros')" class="nav-boton">Libros</a></li>
            <li role="presentation"><a href="#" onclick="navigate('http://localhost/theLibrary/listaAutores')" class="nav-boton">Autores</a></li>
            {if $isLoggedIn}
              <li role="presentation"><a href="#" onclick="navigate('http://localhost/theLibrary/crearLibros')" class="nav-boton">Subir Libro</a></li>
              <li role="presentation"><a href="#" onclick="navigate('http://localhost/theLibrary/crearAutores')" class="nav-boton">Subir Autor</a></li>
              {if $isSuperUser}
              <li role="presentation"><a href="#" onclick="navigate('http://localhost/theLibrary/adminUsers')" class="nav-boton">Admin Usuarios</a></li>
              {/if}
            {/if}
          </ul>
        </div>
      </div>
    </nav>
    <!-- fin nav bar -->
  </header>
   
    <div class="col-md-12 main-content">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar"></div>
          </div>
        </div>
      </div>
    </div>
  <!-- pie de pagina-->
  <footer class="container footer">
    <div class="row">
      <div class="col-md-4 col-sm-6 footer-navigation">
        <a href="#" onclick="navigate('http://localhost/theLibrary/listaLibros')" ><h3> The Library </h3></a>
        <p class="company-name">The Library © 2018</p>
      </div>
      <div class="col-md-4 col-sm-6 footer-contacts">
        <form>
          <label for="suscribe">Suscribite a nuestro newsletter</label>
          <input class="form-control js-input-newsletter" type="email" name="subscribe" placeholder="Email Address">
          <button class="btn btn-default btn-categorias js-bnt-newsletter" type="button">Enviar</button>
        </form>
      </div>
      <div class="col-md-4 footer-about">
        <div class="social-links social-icons">
          <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-3x fa-fw"></i></a>
          <a href="https://twitter.com/?lang=es" target="_blank"><i class="fa fa-twitter fa-3x fa-fw"></i></a>
          <a href="http://www.macrojuegos.com/" target="_blank"><i class="fa fa-gamepad fa-3x fa-fw"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--fin pie pagina-->
    
    <!-- Ventana emergente para los detalles de libros-->
 <div class="modal fade" tabindex="-1" role="dialog" id="manga-modal">
  <div class="modal-dialog .col-md-8 .col-md-offset-2" role="document">
    <div class="modal-content contenido-emergente">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="boton-cerrar-emergente">&times;</span></button>
        <h4 class="modal-title">Detalles</h4>
      </div>
      <div class="modal-body"></div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
  <script src="js/script.js"></script> 
</body>
</html>
