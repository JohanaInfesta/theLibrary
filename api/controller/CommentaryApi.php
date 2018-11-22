<?php

require_once "Api.php";
require_once "./../model/CommentaryModel.php";
// require_once "./../view/CommentaryView.php";

class CommentaryApi extends Api{

  protected $model;
  // protected $view;

  function __construct(){

    parent::__construct();
    $this->model = new CommentaryModel();
    // $this->view = new CommentaryView();
  }

  function getCommentarys($param = null){

      $data = $this->model->getCommentarys();
      // $this->view->viewComments($data);
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
    $id_commentary = $_POST['id_commentary'];
    $commentary = $_POST['commentary'];
    $qualification = $_POST['qualification'];
    $id_book_fk = $_POST['id_book_fk'];
    $id_user_fk = $_POST['id_user_fk'];
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
  }
}
?>
