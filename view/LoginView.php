<?php
class LoginView extends View
{
  function mostrarLogin($error = ''){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/login.tpl');
  }

  function mostrarRegistro($error = ''){
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/registro.tpl');
  }

  function mostrarListaUsers($users){
    $this->smarty->assign('users', $users);
    $this->smarty->display('templates/listaUsers.tpl');
  }
}

 ?>