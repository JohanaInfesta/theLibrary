<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Playfair+Display" rel="stylesheet">
  <!-- font-family: 'Montserrat', sans-serif;
  font-family: 'Playfair Display', serif; -->
  <title>The Library</title>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#" onclick="navigate('http://localhost/theLibrary/booksList')">The Library</a>
      {if $isLoggedIn}
      <a href="logout" class="btn btn-login">Sing out</a>
      {else}
      <button type="submit" onclick="navigate('http://localhost/theLibrary/registro')" class="btn btn-outline-dark btn-register">Registrarse!</button>
      <button type="submit" onclick="navigate('http://localhost/theLibrary/login')" class="btn btn-outline-dark btn-login">Sing in</button>
      {/if}
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link"  onclick="navigate('http://localhost/theLibrary/booksList')" href="#">All books <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown authorsDropdown">
            <a class="nav-link dropdown-toggle" onclick="navigate('http://localhost/theLibrary/allAuthors')" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All authors
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" id="authors">
              {foreach from=$authors item=author}
              <a class="dropdown-item" href="#" onclick="navigatePost('http://localhost/theLibrary/author', {ldelim}id_author:{$author['id_author']}{rdelim})">
                {$author['name']} {$author['surname']}
              </a>
              {/foreach}
            </div>
          </li>
          {if $isLoggedIn}
            <li class="nav-item">
              <a class="nav-link" onclick="navigate('http://localhost/theLibrary/addBook')" href="#">Add book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="navigate('http://localhost/theLibrary/addAuthor')" href="#">Add author</a>
            </li>
            {if $isSuperUser}
              <li class="nav-item" role="presentation"><a class="nav-link" href="#" onclick="navigate('http://localhost/theLibrary/adminUsers')">Admin Usuarios</a></li>
            {/if}
          {/if}
        </ul>
      </div>
    </nav>
  </header>

  <div class="main-content">
    <div class="row">
      <div class="col">
        <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; background-color: #927986;"></div>
        </div>
      </div>
    </div>
  </div>

  <footer class="container footer">
    <div class="row">
      <div class="col-md-4 col-sm-6 footer-navigation">
        <a href="#" onclick="navigate('http://localhost/theLibrary/booksList')" ><h3>  The Library </h3></a>
        <p class="company-name">The Library © 2018</p>
      </div>
      <div class="col-md-4 col-sm-6 footer-contacts">
        <form>
          <label for="suscribe">Suscribite a nuestro newsletter</label>
          <input class="form-control js-input-newsletter" type="email" name="subscribe" placeholder="Email Address">
          <button class="btn btn-outline-dark btn-categorias js-bnt-newsletter" type="button">Enviar</button>
        </form>
      </div>
      <div class="col-md-4 footer-about">
        <div class="social-links social-icons">
          <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-2x fa-fw"></i></a>
          <a href="https://twitter.com/?lang=es" target="_blank"><i class="fa fa-twitter fa-2x fa-fw"></i></a>
          <a href="http://www.macrojuegos.com/" target="_blank"><i class="fa fa-gamepad fa-2x fa-fw"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
  <script src="js/script.js"></script>
  <script src="./js/scriptApi.js" ></script>
  <!-- <script src="js/handlebars-v4.0.12.js"></script> <!-- js de handlebars--> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.js"></script>
</body>
</html>
