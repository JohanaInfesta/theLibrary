<?php
class AuthorView extends View
{
  function showAuthors($authors){
    $this->smarty->assign('authors', $authors);
    $this->smarty->display('templates/authors.tpl');
  }

  function viewBooksByAuthor($books, $author){
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->assign('books', $books);
    $this->smarty->assign('author', $author);
    $this->smarty->display('templates/books.tpl');
  }


  function showCreateAuthor($author = null){
    if($author){
      $this->smarty->assign('author', $author);
    }
    $this->smarty->display('templates/formAuthor.tpl');
  }

  function errorCreateAuthor($error, $name, $surname, $nationality, $biography, $id_image){
    $this->smarty->assign(array('nombre' => $name , 'apellido' => $surname, 'nacionalidad' => $nationality, 'biografia' => $biography, 'images' => $id_image));
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/formAuthor.tpl');
  }
}
?>
