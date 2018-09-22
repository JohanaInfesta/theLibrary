<?php
class UsuarioModel extends Model
{

  function __construct() {
    parent::__construct();
  }
  function getUsers(){
    $sentencia = $this->db->prepare( "SELECT * FROM usuario");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getUser($userMail){
    $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE mail = ? LIMIT 1");
    $sentencia->execute([$userMail]);
    return $sentencia->fetch();
  }
  
  function userExist($userMail){
    $sentencia = $this->db->prepare("SELECT mail.* FROM usuario WHERE mail = ? LIMIT 1");
    $sentencia->execute([$userMail]);
    return $sentencia->fetch();
  }

  function recordUser($userName, $userMail, $hash){
    $sentencia = $this->db->prepare('INSERT INTO usuario(nombre, mail, clave) VALUES(?,?,?)');
    $sentencia->execute([$userName,$userMail, $hash]);
  }

  function deleteUser($id_user){
    $sentencia = $this->db->prepare( "DELETE FROM usuario WHERE id_usuario = ?");
    $sentencia->execute([$id_user]);
  }

  function editPermissionSuper($id_user, $permisoSuper){
    $sentencia = $this->db->prepare('UPDATE usuario SET super_user = ?  WHERE id_usuario = ?');
    $sentencia->execute([$permisoSuper, $id_user]);
  }

  /**
   * usar para chequear si el usuario esta logeado
   * UsuarioModel::isLoggedIn()
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
   * UsuarioModel::isSuperUser()
   */
  static function isSuperUser(){
    $user = $_SESSION['USER'];
    if ($user)
      return (boolean) $user['super_user'];
    return false;
  }
}
?>