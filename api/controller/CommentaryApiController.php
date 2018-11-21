<?php

require_once "ApiController.php";
require_once "./../model/CommentaryModel.php";

class CommetaryApiController extends ApiController{

  protected $model;

  function __construct(){

    parent::__construct();
    $this->model = new CommentaryModel();
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
    $qualification = $_POST['qualification'];
    $id_book_fk = $_POST['id_book_fk'];
    $id_user_fk = $_POST['id_user_fk'];
<<<<<<< HEAD
    if ($id_commentary != null) {
      $this->model->editCommentary($id_commentary, $commentary);
    }else{
      $this->model->addCommentary($commentary, $qualification, $id_book, $id_user);
=======
    // if ($id_commentary != null) {
    //   $this->model->editCommentary($id_commentary, $commentary);
    // }else{
    //   $this->model->addCommentary($commentary, $qualification, $id_book, $id_user)
    // }
  }

  function editCommentary($params){
    //   if (UserModel::isLoggedIn()) {
    //     $id_commentary = $params
    //     $commentary = $this->model->getCommentary($id_commentary);
    //     // $this->view->viewFormCommentary($commentary);
    //   }
>>>>>>> abc20e4c34afd70b9ccff5cb45aababe3d318530
    }
  }
}
  // function editCommentary($params){
  //   if (UserModel::isLoggedIn()) {
  //     $id_commentary = $params
  //     $commentary = $this->model->getCommentary($id_commentary);
  //     // $this->view->viewFormCommentary($commentary);
  //   }
  // }
  // }
  ?>
