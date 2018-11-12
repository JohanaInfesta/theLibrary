<?php

class CommentaryModel{

  private $db_connection;

  function __construct(){
    $this->db_connection = new PDO('mysql:host=localhost;'
    .'dbname=db_commentarys;charset=utf8'
    , 'root', '');
  }
  function getCommentarys($id_book){
    $sentencia = $this->db_connection->prepare( "SELECT * from commentary WHERE id_book_fk=?");
    $sentencia->execute([$id_book]);
    return $sentencia->fetchAll(PDO::FETCH_OBJ);

  }
  function getCommentary($id_commentary){
    $sentencia = $this->db_connection->prepare( "SELECT * FROM commentary WHERE id_commentary = ?");
    $sentencia->execute([$id_commentary]);
    return $sentencia->fetch(PDO::FETCH_OBJ)

  }
  function addCommentary($id_book, $id_user, $commentary, $qualification){
    $sentencia = $this->db_connection->prepare("INSERT INTO commentary(commentary, qualification, id_book_fk, id_user_fk) VALUES(?,?,?,?)");
    $sentencia->execute([$id_book, $id_user, $commentary, $qualification]);
  }
  function editCommentary($){
    // $sentencia = $this->db_connection->prepare("UPDATE ");   hacer bien
    // $sentencia->execute([$]);
  }
  function deleteCommentary($id){
    $sentencia = $this->prepare("DELETE FROM commentary WHERE id_commentary=?");
    $sentencia->execute([$id])
  }
}

?>
