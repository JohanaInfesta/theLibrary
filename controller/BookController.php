<?php
include_once('model/BookModel.php');
include_once('view/BookView.php');
include_once('model/AuthorModel.php');
include_once('model/ImagesModel.php');
include_once('model/UserModel.php');

class BookController extends Controller
{

  function __construct()
  {
    $this->view = new BookView();
    $this->model = new BookModel();
    $this->a_model = new AuthorModel();
    $this->i_model = new ImagesModel();
    $this->u_model = new UserModel();
  }

  public function index()
  {
    $books = $this->model->getBooks();
    foreach ($books as $b => $book){
      $books[$b]["images"] = $this->i_model->getImages($book['id_book']);
    }
    $this->view->viewBooks($books);
  }

  public function create()
  {
    $authors = $this->a_model->getAuthors();
    $genders = $this->genders();
    $this->view->viewFormBook($authors, $genders);
  }

  public function edit($params) {
    if (UserModel::isLoggedIn()) {
      $id_book = $params[0];
      if ($id_book){
        $authors = $this->a_model->getAuthors();
        $genders = $this->genders();
        $this->view->viewFormBook($authors, $genders, $this->model->getBook($id_book), $this->i_model->getImages($id_book));
      } else {
        $this->view->viewFormBook($authors, $genders);
      }
    } else {
      header('Location: ' . HOME);
    }
  }

  public function description(){
    $id_book= $_POST['id_book'];
    $book = $this->model->getBook($id_book);
    $user = $this->u_model->getUserLog();
    $book["images"] = $this->i_model->getImages($book["id_book"]);

    $this->view->viewBook($book, $user);
  }

  public function store()
  {
    if (UserModel::isLoggedIn()) {
      $routeTempImages = $_FILES['images']['tmp_name'];
      $id_book = $_POST['id_book'];
      $name = $_POST['name'];
      $gender = $_POST['gender'];
      $editorial =$_POST['editorial'];
      $id_author = $_POST['id_author'];
      $review = $_POST['review'];
      $nbr_pages =  $_POST['nbr_pages'];
      if ($id_book != null) {
        //if($_FILES['images']['tmp_name'] != ""){
          $this->model->editBook($id_book, $name, $gender, $editorial, $id_author, $review, $nbr_pages, $routeTempImages);
        //}else{
          //$this->model->editBook($id_book, $name, $gender, $editorial, $id_author, $review, $nbr_pages);
        //}
      } else {
        $this->model->addBook($name, $gender, $editorial, $id_author, $review, $nbr_pages, $routeTempImages);
      }

      echo json_encode(['message' => 'El libro se guardo exitosamente.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function delete($params)
  {
    if (UserModel::isLoggedIn()) {
      $id_book = $params[0];
      $this->model->deleteBook($id_book);
      echo json_encode(['message' => 'La operación se completo con exito.']);
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function deleteImage($params)
  {
    if (UserModel::isLoggedIn()) {
      $id_image = $params[0];
      if ($id_image){
          $this->i_model->deleteImage($id_image);
          echo json_encode(['message' => 'La imagen se borro exitosamente.']);
        } else {
          echo json_encode(['error' => 'No se encontro la imagen con ID: ' . $id_image]);
        }
    } else {
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  private function genders(){
    return ['Novela', 'Acción', 'Drama', 'Poesía'];
  }
}
