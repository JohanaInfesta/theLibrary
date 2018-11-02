<?php

class BookModel extends Model
{
  function getBooks($id_author = null){
    if($id_author == null){
    $sentence = $this->db->prepare( "SELECT book.*, CONCAT_WS(' ', a.name, a.surname) AS author FROM book LEFT JOIN author AS a ON a.id_author = book.id_author");
    $sentence->execute();
    }else{
      $sentence = $this->db->prepare( "SELECT book.*, CONCAT_WS(' ', a.name, a.surname) AS author FROM book LEFT JOIN author AS a ON a.id_author = book.id_author WHERE book.id_author = ?");
      $sentence->execute([$id_author]);
    }
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
  }

  function getBook($id_book){
    $sentence  = $this->db->prepare( "SELECT book.*, CONCAT_WS(' ', a.name, a.surname) AS author FROM book LEFT JOIN author AS a ON a.id_author = book.id_author WHERE book.id_book = ?");
    $sentence->execute([$id_book]);
    return $sentence->fetch();
  }

  private function addImages($images, $id_book){

    $routes = [];

    foreach ($images as $image) {
      $route = 'images/' . uniqid() .'.jpg';
      move_uploaded_file($image, $route);
      $routes[] = $route;
    }

    $sentence_images = $this->db->prepare('INSERT INTO image(id_book, route) VALUES(?,?)');

    foreach ($routes as $route) {
      $sentence_images->execute([$id_book,$route]);
    }
  }

  function addBook($name, $gender, $editorial, $id_author, $review, $nbr_pages, $images){
    $sentence = $this->db->prepare('INSERT INTO book(name, gender, editorial, id_author, review, nbr_pages) VALUES(?,?,?,?,?,?)');
    $sentence->execute([$name, $gender, $editorial, $id_author, $review, $nbr_pages]);
    $id_book = $this->db->lastInsertId();
    $this->addImages($images, $id_book);
  }

  function editBook($id_book, $name, $gender, $editorial, $id_author, $review, $nbr_pages, $images = NULL){
    $sentence = $this->db->prepare( "UPDATE book SET name = ?, gender = ?, editorial = ?, id_author = ?, review = ?, nbr_pages = ? WHERE id_book=?");
    $sentence->execute([$name, $gender, $editorial, $id_author, $review, $nbr_pages, $id_book]);
    //if($images != NULL){ //verificar que no cargue las imagenes cuando no envia nada
    $this->addImages($images, $id_book);
    //}
  }

  function deleteBook($id_book){
    $sentence = $this->db->prepare( "DELETE FROM book WHERE id_book=?");
    $sentence->execute([$id_book]);
  }
}

 ?>
