<?php

class CommentaryModel extends Model{

<<<<<<< HEAD
  function getCommentarys($id_book){
// "SELECT commentary, * FROM commentary ORDER BY score ASC LIMIT =? WHERE id_book =? "//DESC LIMIT // mirar
    $sentencia = $this->db->prepare( "SELECT c.*, u.name  FROM comment AS c LEFT JOIN user AS u ON u.id_user = c.id_user WHERE id_book = ?");
    $sentencia->execute([$id_book]);
    $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($result);
  }

  function getCommentary($id_comment, $id_user){ //Solo puede editar si el usuario log es el mismo que el user que creo el comentario
    $sentencia = $this->db->prepare( "SELECT * FROM comment WHERE id_comment = ? AND id_user = ?");
    $sentencia->execute([$id_comment, $id_user]);
    return $sentencia->fetch();
  }

  function addCommentary($comment, $score, $id_book, $id_user){
    $sentencia = $this->db->prepare("INSERT INTO comment(comment, score, id_book, id_user) VALUES(?,?,?,?)");
    $sentencia->execute([$comment, $score, $id_book, $id_user]);
  }

  function editCommentary($id_comment, $comment, $id_user){
    $sentencia = $this->db->prepare("UPDATE comment SET comment = ? WHERE id_comment = ? AND id_user = ?");
    $sentencia->execute([$comment, $id_comment, $id_user]);
  }

  function deleteCommentary($id_comment){
    $sentencia = $this->prepare("DELETE FROM comment WHERE id_comment=?");
    $sentencia->execute([$id_comment]);
  }
=======
//   protected $db;
//
//   function __construct()
//   {
//     $this->db = $this->Connect();
//   }
//
//   function Connect(){
//     return new PDO('mysql:host-localhost;'
//     .'dbname=library;charset=utf8'
//     , 'root', '');
// }


  function getCommentarys(){
    // "SELECT commentary, * FROM commentary ORDER BY score.id ASC LIMIT =? WHERE id_book_fk =? "//DESC LIMIT // mirar
    $sentencia = $this->db->prepare( "SELECT * FROM commentary ");
    $sentencia->execute();
    return  $sentencia->fetchALL(PDO::FETCH_ASSOC);
  }

    function getCommentary($id_commentary){
      $sentencia = $this->db->prepare( "SELECT * FROM commentary WHERE id_commentary = ?");
      $sentencia->execute([$id_commentary]);
      return $sentencia->fetch();
    }

    function addCommentary($commentary, $score, $id_book, $id_user){
      $sentencia = $this->db->prepare("INSERT INTO commentary(commentary, score, id_book_fk, id_user_fk) VALUES(?,?,?,?)");
      $sentencia->execute([$id_book, $id_user, $commentary, $score]);
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
>>>>>>> e4e3e8dbb794a5a906c8ee079714c4b63d1e629c

}

?>
