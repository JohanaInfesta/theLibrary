<?php
class IndexView extends View
{
  function mostrarIndex($authors){
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->assign('isSuperUser', UserModel::isSuperUser());
    $this->smarty->assign('authors', $authors);
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
