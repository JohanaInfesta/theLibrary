<?php

require_once "Api.php";
require_once "./../model/CommentaryModel.php";
// require_once './../model/UserModel.php';
// require_once "ApiSecuredController.php";

class CommentaryApi extends Api{

  protected $model;
  protected $UserModel;

  function __construct(){
    parent::__construct();
    $this->model = new CommentaryModel();
    // $this->UserModel = new ApiSecuredController();
  }

  function getCommentarys($param = null){
    if(isset($param)){
      $id_comment = $param[0];
      $data = $this->model->getCommentary($id_comment);
    }else{
      $data = $this->model->getCommentarys();
    }
    if(isset($data)){
      return $this->json_response($data, 200);
    }else{
      return $this->json_response(null,400);
    }
  }


  function deleteCommentary($param){
    // if ($this->isSuperUser() && $this->isLoggedIn()){
    if(count($param) == 1){
      $id_comment = $param[0];
      $r = $this->model->deleteCommentary($id_comment);
      if ($r == false) {
        return $this->json_response($r, 300);
      }
      return $this->json_response($r, 200);
    }else{
      return $this->json_response("No task specified", 300);
    }
    // }
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
    //     $id_commentary = $params
    //     $commentary = $this->model->getCommentary($id_commentary);
  }
}
?>
