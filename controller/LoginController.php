<?php
include_once('model/UserModel.php');
include_once('view/LoginView.php');

class LoginController extends Controller
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new UserModel();
  }

  public function index()
  {
    $this->view->mostrarLogin();
  }
  
  public function registro(){
    $this->view->mostrarRegistro();
  }

  public function verify($userMail = '', $password = '')
  {
    if (empty($userMail)&&(empty($password))){
      $userMail = $_POST['mail'];
      $password = $_POST['clave'];
    }

    if(!empty($userMail) && !empty($password)){
      $user = $this->model->getUser($userMail);

      if((!empty($user)) && password_verify($password, $user['pass'])) {
          session_start();
          $_SESSION['USER'] = $user;
          $_SESSION['LAST_ACTIVITY'] = time();
          echo json_encode(['url' => HOME]);
      } else {
          echo json_encode(['error' => 'Usuario o contraseña incorrectos']);
      }
    }
  }
  public function create()
  {
    $userName = $_POST['name'];
    $userMail = $_POST['mail'];
    $password = $_POST['clave'];
    $confirmPassword = $_POST['confirmarClave'];
    $hash = password_hash($password, PASSWORD_DEFAULT);  

    if ($password != $confirmPassword){
      echo json_encode(['error' => 'Las contraseñas no coinciden']);
    }else{
      if ($this->model->userExist($userMail)){
        echo json_encode(['error' => 'El mail ya esta registrado']);
      }else{
        $this->model->recordUser($userName, $userMail, $hash);
        $this->verify($userMail, $password);
      }

    }
  }

  public function delete($params)
  {
    if (UserModel::isLoggedIn() && UserModel::isSuperUser()) {
      $id_user = $params[0];
      $this->model->deleteUser($id_user);
      echo json_encode(['message' => 'El usuario a sido eliminado exitosamente.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function superUser($params){
    if (UserModel::isLoggedIn() && UserModel::isSuperUser()) {
      $id_user = $params[0];
      $permisoSuper = $params[1];
      
      $this->model->editPermissionSuper($id_user, $permisoSuper);
      echo json_encode(['message' => 'El permiso se cambio correctamente']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.HOME);
  }

  public function listaUsers(){
    $users = $this->model->getUsers();
    $userLog = $this->model->getUserLog();
    $this->view->mostrarListaUsers($users, $userLog);
  }
}

 ?>
