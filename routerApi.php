<?php
  // require_once 'Router.php';
  include_once 'config/ConfigApi.php'
  require_once 'api/CommentaryApiController.php';
  // include_once 'model/Model.php';
  // include_once 'model/CommentaryModel.php';
  // include_once 'controller/Controller.php';


  function parseURL($url)
  {
    $urlExploded = explode('/', $url);
    $arrayReturn[ConfigApp::$RESOURCE] = $urlExploded[RESOURCE]. '#' .$_SERVER['REQUEST_METHOD'];
    $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[VALOR1]) ? array_slice($urlExploded,1) : null;
    return $arrayReturn;
  }

  if(isset($_GET['resource'])){
    $urlData = parseURL($_GET['resource']);
    $resource = $urlData[ConfigApi::$RESOURCE];
    if(array_key_exists($resource,ConfigApi::$RESOURCES)){
      $params = $urlData[ConfigApi::$PARAMS];
      $controller_method = explode('#',ConfigApi::$RESOURCES[$resource]); //Array[0] -> TareasController [1] -> index
      $controller =  new $controller_method[0]();
      $metodo = $controller_method[1];
      if(isset($params) &&  $params != null){
        echo $controller->$metodo($params);
      }
      else{
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
