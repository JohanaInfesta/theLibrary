<?php
class IndexView extends View
{
  function mostrarIndex(){
    $this->smarty->assign('isLoggedIn', UserModel::isLoggedIn());
    $this->smarty->assign('isSuperUser', UserModel::isSuperUser());
    $this->smarty->display('templates/index.tpl');
  }
}

 ?>
