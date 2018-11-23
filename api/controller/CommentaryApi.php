<?php

require_once "Api.php";
require_once "./../model/CommentaryModel.php";

class CommentaryApi extends Api{

  protected $model;

  function __construct(){

    parent::__construct();
    $this->model = new CommentaryModel();
  }

  function getCommentarys(){

      $data = $this->model->getCommentarys();
      if(isset($data)){
        return $this->json_response($data , 200);
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

  function createCommentary(){
    $objJson = $this->getJSONData();

    $id_comment = $objJson->id_comment;
    $comment = $objJson->comment;
    $score = $objJson->score;
    $id_book = $objJson->id_book;
    $id_user = $objJson->id_user;

    if ($id_comment != null) {
      $this->model->editCommentary($id_comment, $comment);
    }else{
      $data=$this->model->addCommentary($comment, $score, $id_book, $id_user);
    }
    return $this->json_response($data , 200);
  }

  function editCommentary($params){
    //   if (UserModel::isLoggedIn()) {
    //     $id_commentary = $params
    //     $commentary = $this->model->getCommentary($id_commentary);
    //     // $this->view->viewFormCommentary($commentary);
    //   }
  }
}
?>
