<?php
class UserModel extends Model
{

  function __construct() {
    parent::__construct();
  }
  function getUsers(){
    $sentence = $this->db->prepare( "SELECT * FROM usuario");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function getUser($userMail){
    $sentence = $this->db->prepare( "SELECT * FROM usuario WHERE mail = ? LIMIT 1");
    $sentence->execute([$userMail]);
    return $sentence->fetch();
  }
  
  function userUserModelExist($userMail){
    $sentence = $this->db->prepare("SELECT mail.* FROM usuario WHERE mail = ? LIMIT 1");
    $sentence->execute([$userMail]);
    return $sentence->fetch();
  }

  function recordUser($userName, $userMail, $hash){
    $sentence = $this->db->prepare('INSERT INTO usuario(nombre, mail, clave) VALUES(?,?,?)');
    $sentence->execute([$userName,$userMail, $hash]);
  }

  function deleteUser($id_user){
    $sentence = $this->db->prepare( "DELETE FROM usuario WHERE id_usuario = ?");
    $sentence->execute([$id_user]);
  }

  function editPermissionSuper($id_user, $permisoSuper){
    $sentence = $this->db->prepare('UPDATE usuario SET super_user = ?  WHERE id_usuario = ?');
    $sentence->execute([$permisoSuper, $id_user]);
  }

  /**
   * usar para chequear si el usuario esta logeado
   * UserModel::isLoggedIn()
   */
  static function isLoggedIn() {
    session_start();
    $isLoggedIn = false;
    if (isset($_SESSION['USER']) && ((time() - (int)$_SESSION['LAST_ACTIVITY']) < 1800)) {
      $isLoggedIn = true;
      $_SESSION['LAST_ACTIVITY'] = time();      
    }
    return $isLoggedIn;
  }

  /**
   * usar para chequear si el usuario es administrador
   * UserModel::isSuperUser()
   */
  static function isSuperUser(){
    $user = $_SESSION['USER'];
    if ($user)
      return (boolean) $user['super_user'];
    return false;
  }
}
?>