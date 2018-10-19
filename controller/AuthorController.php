<?php
include_once('model/AuthorModel.php');
include_once('model/BookModel.php');
include_once('view/AuthorView.php');
include_once('model/ImagesModel.php');

class AuthorController extends Controller
{

  function __construct()
  {
    $this->view = new AuthorView();
    $this->model = new AuthorModel();
    $this->b_model = new BookModel();
    $this->i_model = new ImagesModel();
  }

  public function index(){
    $authors = $this->model->getAuthors();
    $this->view->showAuthors($authors);
  }

  public function create(){
    $this->view->showCreateAuthor();
  }

  public function booksByAuthor(){
    $id_author = $_POST['id_author'];
    $author = $this->model->getAuthor($id_author);
    $books = $this->b_model->getBooks($id_author);
    foreach ($books as $b => $book) {
      $books[$b]["images"] = $this->i_model->getImages($book["id_book"]);
    }
    $this->view->viewBooksByAuthor($books, $author);
  }

  public function store()
  {
    if(UserModel::isLoggedIn())
    {
      $id_author = $_POST['id_author'];
      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $nationality = $_POST['nationality'];
      $biography = $_POST['biography'];
      $routeTempImages = $_FILES['images']['tmp_name'];

      if($id_author!=null){
        $this->model->editAuthor($id_author, $name, $surname, $nationality, $biography, $routeTempImages);
      }else{
        $this->model->addAuthor($name, $surname, $nationality, $biography, $routeTempImages);
      }
      echo json_encode(['message' => 'El Autor se guardo exitosamente.']);
    }else{
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function delete($params)
  {
    if(UserModel::isLoggedIn()){
      $id_author = $params[0];
      try {
        if ($this->model->deleteAuthor($id_author)) {
          echo json_encode(['message' => 'El autor se elimino exitosamente.']);
        }else{
          throw new Exception('No se puede eliminar el autor ya que contiene Libros.');
        }
      } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
      }

    }else{
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function edit($params)
  {
    if (UserModel::isLoggedIn()) {
      $id_author = $params[0];
      $author = $this->model->getAuthor($id_author);
      $this->view->showCreateAuthor($author);
    }else{
      header('Location: ' . HOME);
    }
  }
}
?>
