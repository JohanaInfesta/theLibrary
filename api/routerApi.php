<?php
require_once 'config/Router.php';
require_once 'api/CommentaryApiController.php';
include_once '../model/Model.php';
include_once '../model/CommentaryModel.php';
include_once '../controller/Controller.php';
include_once 'controller/CommentaryApiController.php';
include_once '../view/View';
include_once '../view/CommentaryView.php';

$router = new Router();

// rutas de la api
$router->addRoute("commentary/:id_book", "GET", "CommentaryApiController", "getCommentarys");
$router->addRoute("commentary/:id", "DELETE", "CommentaryApiController", "deleteCommentary");
$router->addRoute("commentary", "POST", "CommentaryApiController", "createCommentary");
$router->addRoute("commentary/:id","PUT", "CommentaryApiController", "editCommentary");

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
 ?>
