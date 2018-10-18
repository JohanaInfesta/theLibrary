<?php
class AuthorModel extends Model
{

  function getAuthors(){
    $sentencia = $this->db->prepare( "SELECT * FROM author");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function getAuthor($id_author){
    $sentencia = $this->db->prepare("SELECT * FROM author WHERE id_author = ?");
    $sentencia->execute([$id_author]);
    return $sentencia->fetch();
  }

  function addAuthor($name, $surname, $nationality, $biography){
    $sentencia=$this->db->prepare("INSERT INTO author(name, surname, nationality, biography) VALUES(?,?,?,?)");
    $sentencia->execute([$name, $surname, $nationality, $biography]);
  }

  function editAuthor($id_author, $name, $surname, $nationality, $biography){
    $sentencia = $this->db->prepare("UPDATE author SET (name = ?, surname = ?, nationality = ?, biography = ?) WHERE id_author = ? ");
    $sentencia->execute([$id_author, $name, $surname, $nationality, $biography]);
  }

  function deleteAuthor($id_author){
    $sentencia=$this->db->prepare("DELETE FROM author WHERE id_author = ?");
    return $sentencia->execute([$id_author]);
  }
}


?>
