<?php
include_once('model/AuthorModel.php');
include_once('model/BookModel.php');
include_once('view/AuthorView.php');

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
    echo "<script>console.log(".json_encode($id_author).");</script>";            
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
      $id_author = $_POST["id_author"];
      $name = $_POST["name"];
      $surname = $_POST["surname"];
      $nationality = $_POST["nationality"];
      $biography = $_POST["biography"];

      if(!empty($id_author)){
        $this->model->editAuthor($id_author, $name, $surname, $nationality, $biography);
      }else{
        $this->model->addAuthor($name, $surname, $nationality, $biography);
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
    if (UserModel::igLoggedIn()) {
      $id_author = $params[0];
      $author = $this->model->getAuthor($id_author);
      $this->view->showCreateAuthor($author);
    }else{
      header('Location: ' . HOME);
    }
  }
}
?>
