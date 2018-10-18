<?php

  error_reporting(E_ALL ^ E_NOTICE);

  define('ACTION', 0);
  define('VALOR1', 1);
  define('VALOR2', 2);

   include_once 'config/ConfigApp.php';
   include_once 'model/Model.php';
   include_once 'model/BookModel.php';
   include_once 'model/UserModel.php';
   include_once 'model/AuthorModel.php';
   //include_once 'model/ComentariosModel.php';
   include_once 'view/View.php';
   include_once 'view/AuthorView.php';
   include_once 'view/LoginView.php';
   include_once 'view/BookView.php';
   //include_once 'view/ComentariosView.php';
   include_once 'controller/Controller.php';
   include_once 'controller/IndexController.php';
   include_once 'controller/BookController.php';
   include_once 'controller/AuthorController.php';
   include_once 'controller/LoginController.php';

function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[ACTION];
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[VALOR1]) ? array_slice($urlExploded,1) : null;
  return $arrayReturn;
}

  if(isset($_GET['action'])){
     $urlData = parseURL($_GET['action']);
      $action = $urlData[ConfigApp::$ACTION];
      if(array_key_exists($action,ConfigApp::$ACTIONS)){
          $params = $urlData[ConfigApp::$PARAMS];
          $action = explode('#',ConfigApp::$ACTIONS[$action]);
          $controller =  new $action[0]();
          $metodo = $action[1];
          if (isset($params) && $params != null){
              echo $controller->$metodo($params);
          } else {
              echo $controller->$metodo();
          }
      }
  }

 ?>
