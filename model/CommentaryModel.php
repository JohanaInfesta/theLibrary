<?php

class CommentaryModel{

  private $db_connection;

  function __construct(){
    $this->db_connection = new PDO('mysql:host=localhost;'
    .'dbname=db_commentarys;charset=utf8'
    , 'root', '');
  }
  function getCommentarys(){

  }
  function getCommentary(){

  }
  function addCommentary(){

  }
  function editCommentary(){

  }
  function deleteCommentary(){

  }
}

?>
