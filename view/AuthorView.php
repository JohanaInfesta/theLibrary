<?php
class AuthorView extends View
{
  function showAuthors($authors){
    $this->smarty->assign('authors', $authors);
    $this->smarty->display('templates/authors.tpl');
  }

  function viewBooksByAuthor($books, $id_author){
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->assign('book', $books);
    $this->smarty->assign('author', $id_author);
    $this->smarty->display('templates/libros.tpl');
  }


  function showCreateAuthor($author = null){
    if($author){
      $this->smarty->assign('author', $author);
    }
    $this->smarty->display('templates/formAuthor');
  }

  function errorCreateAuthor($error, $name, $surname, $nationality, $biography){
    $this->smarty->assign(array('nombre' => $name , 'apellido' => $surname, 'nacionalidad' => $nationality, 'biografia' => $biography));
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formCategorias.tpl');
  }
}
?>
