<?php

error_reporting(E_ALL ^ E_NOTICE);

require_once "config/ConfigApi.php";
require_once "controller/CommentaryApi.php";
// require_once '../model/Model.php';
// require_once '../model/CommentaryModel.php';
// require_once '../controller/Controller.php';


function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApi::$RESOURCE] = $urlExploded[0].'#'.$_SERVER['REQUEST_METHOD'];
  $arrayReturn[ConfigApi::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded,1) : null;  return $arrayReturn;
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

?>
