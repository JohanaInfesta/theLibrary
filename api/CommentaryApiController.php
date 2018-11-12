<?php

require_once "ApiController.php";
require_once "./model/CommentaryModel";

class CommetaryApiController extends ApiController{

  function __construct(){
    parent::__construct();
    $this->model = new CommentaryModel();
  }

  function getCommentarys($id_book){
    $commentary = $this->$model->getCommentarys();
    if (isset($commentary)) {
      return $this->json_response($commentary, 200);
    }else {
      return $this->json_response(null, 404);
    }
  }

  function deleteCommentary($id){
    if (UserModel::isSuperUser()) {
      $commentary = $this->$model->getCommentary($id);
      if ($commentary) {
        $this->model->deleteCommentary($id);
        return $this->json_response($commentary, 200);
      }else{
        return $this->json_response(null, 404);
      }
    }
  }

  function createCommentary($params = []){
    $body = $this->getData();
    $user = $body->user;
    $comentario = $body->comentario;
    $puntaje = $body->puntaje;
    $id_book = $body->id_book;
    $id_commentary = $this->model->addCommentary($user, $texto, $puntaje, $id_book);
    $commentary = $this->model->getCommentary($id_commentary);


  }

  function editCommentary($id){

  }
}


?>
