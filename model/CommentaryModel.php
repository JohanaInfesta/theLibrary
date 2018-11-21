<?php

class CommentaryModel{

  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=library;charset=utf8'
    , 'root', '');
  }
  function getCommentarys($id_book){
// "SELECT commentary, * FROM commentary ORDER BY qualification.id ASC LIMIT =? WHERE id_book_fk =? "//DESC LIMIT // mirar
    $sentencia = $this->db->prepare( "SELECT * FROM commentary WHERE id_book = ?");
    $sentencia->execute([$id_book]);
    return  $sentencia->fetchALL(PDO::FETCH_ASSOC);
    // return json_encode($sentencia);
  }

  function getCommentary($id_commentary){
    $sentencia = $this->db->prepare( "SELECT * FROM commentary WHERE id_commentary = ?");
    $sentencia->execute([$id_commentary]);
    return $sentencia->fetch();
  }

  function addCommentary($commentary, $qualification, $id_book, $id_user){
    $sentencia = $this->db->prepare("INSERT INTO commentary(commentary, qualification, id_book_fk, id_user_fk) VALUES(?,?,?,?)");
    $sentencia->execute([$id_book, $id_user, $commentary, $qualification]);
    $id_commentary = $this->db->lastInsertId();
  }

  function editCommentary($id_commentary, $commentary){
    $sentencia = $this->db->prepare("UPDATE commentary SET commentary WHERE id_commentary =?");
    $sentencia->execute([$id_commentary, $commentary]);
  }

  function deleteCommentary($id_commentary){
    $sentencia = $this->prepare("DELETE FROM commentary WHERE id_commentary=?");
    $sentencia->execute([$id_commentary]);
  }

}

?>
