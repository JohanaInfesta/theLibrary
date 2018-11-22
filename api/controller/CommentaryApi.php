<?php

require_once "Api.php";
require_once "./../model/CommentaryModel.php";

class CommetaryApi extends Api{

  private $model;

  function __construct(){

    parent::__construct();

    $this->model = new CommentaryModel();

  }
  function getCommentarys($params = ''){
    $data = $this->model->getCommentarys();
    if (isset($data)) {
      return $this->json_response($data, 200);
    }else{
      return $this->json_response(null, 404);
    }
  }
  function getCommentarys($id_book){
    if ( isset ( $_GET ['id_book'])) {
      $id_book = $_GET['id_book'];
      $data = $this->model->getCommentarys();
      return $this -> json_response ( $data , 200 );
    }else {
      return $this -> json_response ( null , 404 );
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
    $id_commentary = $_POST['id_commentary'];
    $commentary = $_POST['commentary'];
    $score = $_POST['score'];
    $id_book_fk = $_POST['id_book_fk'];
    $id_user_fk = $_POST['id_user_fk'];
    if ($id_commentary != null) {
      $this->model->editCommentary($id_commentary, $commentary);
    }else{
      $this->model->addCommentary($commentary, $score, $id_book, $id_user);
      // if ($id_commentary != null) {
      //   $this->model->editCommentary($id_commentary, $commentary);
      // }else{
      //   $this->model->addCommentary($commentary, $score, $id_book, $id_user)
      // }
    }

    function editCommentary($params){
      //   if (UserModel::isLoggedIn()) {
      //     $id_commentary = $params
      //     $commentary = $this->model->getCommentary($id_commentary);
      //     // $this->view->viewFormCommentary($commentary);
      //   }
    }
  }
  function editCommentary($params){
    if (UserModel::isLoggedIn()) {
      $id_commentary = $params
      $commentary = $this->model->getCommentary($id_commentary);
      // $this->view->viewFormCommentary($commentary);
    }
  }
}
?>