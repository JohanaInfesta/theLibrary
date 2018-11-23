<?php

class CommentaryModel {

  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }
  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=library;charset=utf8'
    , 'root', '');
  }

  function getCommentarys(){
    // "SELECT commentary, * FROM commentary ORDER BY score ASC LIMIT =? WHERE id_book =? "//DESC LIMIT // mirar
    $sentencia = $this->db->prepare( "SELECT c.*, u.name FROM comment AS c LEFT JOIN user AS u ON u.id_user = c.id_user ORDER BY score DESC");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getCommentary($id_comment){ //Solo puede editar si el usuario log es el mismo que el user que creo el comentario
    $sentencia = $this->db->prepare( "SELECT * FROM comment WHERE id_comment = ?");
    $sentencia->execute([$id_comment]);
    return $sentencia->fetch();
  }

  function addCommentary($comment, $score, $id_book, $id_user){
    $sentencia = $this->db->prepare("INSERT INTO comment(comment, score, id_book, id_user) VALUES(?,?,?,?)");
    $sentencia->execute([$comment, $score, $id_book, $id_user]);
    return $this->db->lastInsertId();
  }

  function editCommentary($id_comment, $comment, $id_user){
    $sentencia = $this->db->prepare("UPDATE comment SET comment = ? WHERE id_comment = ? AND id_user = ?");
    $sentencia->execute([$comment, $id_comment, $id_user]);
  }

  function deleteCommentary($id_comment){
    $sentencia = $this->db->prepare("DELETE FROM comment WHERE id_comment = ?");
    return $sentencia->execute([$id_comment]);
  }
}

?>
