<?php

error_reporting(E_ALL ^ E_NOTICE);

define('ACTION', 0);
define('VALOR1', 1);
define('VALOR2', 2);

require_once "config/ConfigApi.php";
require_once "controller/CommentaryApiController.php";
require_once '../model/Model.php';
require_once '../model/CommentaryModel.php';
require_once '../controller/Controller.php';


function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApi::$RESOURCE] = $urlExploded[ACTION].'#'.$_SERVER['REQUEST_METHOD'];
  $arrayReturn[ConfigApi::$PARAMS] = isset($urlExploded[VALOR1]) ? array_slice($urlExploded,1) : null;  return $arrayReturn;
  return $arrayReturn;

}
if(isset($_GET['resource'])){
  $urlData = parseURL($_GET['resource']);
  $action = $urlData[ConfigApi::$RESOURCE];
  if(array_key_exists($resource,ConfigApi::$RESOURCES)){
    $params = $urlData[ConfigApi::$PARAMS];
    $resource = explode('#',ConfigApi::$RESOURCES[$resource]);
    $controller =  new $resource[0]();
    $metodo = $resource[1];
    if (isset($params) && $params != null){
      echo $controller->$metodo($params);
    } else {
      echo $controller->$metodo();
    }
  }
}

// $router = new Router();
//
// // rutas de la api
// $router->addRoute("commentary", "GET", "CommentaryApiController", "getCommentarys");
// $router->addRoute("commentary/:id", "DELETE", "CommentaryApiController", "deleteCommentary");
// $router->addRoute("commentary", "POST", "CommentaryApiController", "createCommentary");
// $router->addRoute("commentary/:id","PUT", "CommentaryApiController", "editCommentary");
//
// $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
?>
