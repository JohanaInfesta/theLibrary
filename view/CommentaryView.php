<?php
class CommentaryView extends View
{
  function mostrarComentarios($commentarys, $user){
    $this->smarty->assign('commentary', $commentarys);
    $this->smarty->assign('user', $user);
    $this->smarty->assign('isLoggedIn', UsuarioModel::isLoggedIn());
    $this->smarty->assign('isSuperUser', UsuarioModel::isSuperUser());
    $this->smarty->display('templates/commentary.tpl');
  }
}
?>
