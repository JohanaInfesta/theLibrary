<?php

require_once "ApiController.php";
require_once ".model/CommentaryModel";

class CommetaryApiController extends ApiController{
  ;
  function __construct(){
    parent::__construct();
    $this->model = new CommentaryModel();
  }

  function getCommentarys($id_book){

  }

  function deleteCommentary($id){

  }

  function createCommentary($id){

  }

  function editCommentary($id){

  }
}


?>
