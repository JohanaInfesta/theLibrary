<?php
class ComentaryView extends View
{
  function viewComments($comments){
    $this->smarty->assign('comments', $comments);
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->assign('isSuperUser', UserModel::isSuperUser());    
    $this->smarty->display('js/templates/commentary.Handlebars');
  }
  /* function viewBook($book){
    $this->smarty->assign('book', $book);
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->display('templates/book.tpl');
  }
  function viewFormBook($authors, $genders, $book = null, $images = null){
    $this->smarty->assign('authors', $authors);
    $this->smarty->assign('genders', $genders);
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    if ($book) {
      $this->smarty->assign('book', $book);
      if ($images){
        $this->smarty->assign('images', $images);
      }
    }
    $this->smarty->display('templates/formBook.tpl');
  } */
  
}

 ?>
