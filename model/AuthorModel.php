<?php
class AuthorModel extends Model
{

  function getAuthors(){
    $sentence = $this->db->prepare( 'SELECT * FROM author');
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function getAuthor($id_author){
    $sentence = $this->db->prepare('SELECT * FROM author WHERE id_author = ?');
    $sentence->execute([$id_author]);
    return $sentence->fetch();
  }

  function addAuthor($name, $surname, $nationality, $biography, $image){
    $sentence = $this->db->prepare('INSERT INTO author(name, surname, nationality, biography) VALUES(?,?,?,?)');
    $sentence->execute([$name, $surname, $nationality, $biography]);
    $id_author = $this->db->lastInsertId();
    echo json_encode(['message' => $image[0]]);            
    $this->addImage($image, $id_author);
  }

  function editAuthor($id_author, $name, $surname, $nationality, $biography, $image){
    $sentence = $this->db->prepare('UPDATE author SET name = ?, surname = ?, nationality = ?, biography = ? WHERE id_author = ? ');
    $sentence->execute([$name, $surname, $nationality, $biography, $id_author]);
    $this->addImage($image, $id_author);
  }
  private function addImage($image, $id_author){
    $route = 'images/' . uniqid() .'.jpg';
    move_uploaded_file($image[0], $route);
    $sentence = $this->db->prepare('UPDATE author SET route = ? WHERE id_author = ?');
    $sentence->execute([$route, $id_author]);
  }
  function deleteAuthor($id_author){
    $sentence=$this->db->prepare("DELETE FROM author WHERE id_author = ?");
    return $sentence->execute([$id_author]);
  }
}


?>
