<?php
class BookView extends View
{
  function viewBooks($books){
    $this->smarty->assign('books', $books);
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->display('templates/books.tpl');
  }
  function viewBook($book){
    $this->smarty->assign('book', $book);
    $this->smarty->display('templates/book.tpl');
  }
  function viewFormBook($authors, $book = null, $images = null){
    $this->smarty->assign('authors', $authors);
    $this->smarty->assign('isSuperUser', UserModel::isSuperUser());
    if ($book) {
      $this->smarty->assign('book', $book);
      if ($images){
        $this->smarty->assign('images', $images);
      }
    }
    $this->smarty->display('templates/formBook.tpl');
  }
  
}

 ?>
