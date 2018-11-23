<?php

require_once "Api.php";
require_once "./../model/CommentaryModel.php";
// require_once './../model/UserModel.php';
require_once "ApiSecuredController.php";

class CommentaryApi extends Api{

  protected $model;
  protected $UserModel;

  function __construct(){
    // parent::__construct();
    $this->model = new CommentaryModel();
    $this->UserModel = new ApiSecuredController();
  }

  function getCommentarys(){

    if(isset($_GET['id_comment'])){
      $id_comment = $_GET['id_comment'];
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

  function deleteCommentary($id_comment){
    if ($this->isSuperUser() && $this->isLoggedIn()){
      $comment = $this->$model->getCommentary($id_comment);
      if ($comment) {
        $this->model->deleteCommentary($id);
        return $this->json_response($comment, 200);
      }else{
        return $this->json_response(null, 401);
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
