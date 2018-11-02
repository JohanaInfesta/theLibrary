<?php
require_once 'Router.php';
require_once 'api/CommentaryApiController.php';

$router = new Router();

// rutas de la api
$router->addRoute("commentary/:id_book", "GET", "CommentaryApiController", "getCommentarys");
$router->addRoute("commentary/:id", "DELETE", "CommentaryApiController", "deleteCommentary");
$router->addRoute("commentary", "POST", "CommentaryApiController", "createCommentary");
$router->addRoute("commentary/:id","PUT", "CommentaryApiController", "editCommentary");

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);


 ?>
