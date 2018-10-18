<?php
class AuthorView extends View
{
  function mostrarAutores($author){
    $this->smarty->assign('author', $author);
    $this->smarty->display('templates/autores.tpl');
  }

  //function mostrarLibrosPorAutor($book, $id_author){
  //  $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());
  //  $this->smarty->assign('book', $book);
  //  $this->smarty->assign('author', $id_author);
  //  $this->smarty->display('templates/libros.tpl');
  //}


  function mostrarCrearAutor($author = null){
    if($author){
      $this->smarty->assign('author', $author);
    }
    $this->smarty->display('templates/');//colocar form
  }

  function errorCrearAutor($error, $name, $surname, $nationality, $biography){
    $this->smarty->assign(array('nombre' => $name , 'apellido' => $surname, 'nacionalidad' => $nationality, 'biografia' => $biography));
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCategorias.tpl');
  }
}
?>
