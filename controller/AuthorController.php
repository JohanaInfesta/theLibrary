<?php
include_once('model/AuthorModel.php');
include_once('model/BookModel.php');
include_once('view/AuthorView.php');

class AutorController extends Controller
{

  function __construct()
  {
    $this->view = new AuthorView();
    $this->model = new AuthorModel();
    $this->b_model = new BookModel();
    $this->i_model = new ImagesModel();
  }

  public function index(){
    $author = $this->model->getAutores();
    $this->view->showAuthors($author);
  }

  public function createAuthor(){
    $this->view->showCreateAuthor();
  }

  public function booksByAuthor(){
    $id_author = $_POST['id_author'];
    $author = $this->model->getAutor($id_author);
    $books = $this->BookModel->getBooks($id_author);//comprobar que sea getBooks el nombre la function
    foreach ($books as $k => $book) {
      $books[$k]["imagenes"] = $this->i_model->getImages($book["id_book"]);//comprobar nombre funcion
    }
    $this->view->viewBooksByAuthor($author, $books);//falta hacer esta funcion
  }

  public function saveAuthor()
  {
    if(UserModel::isLoggedIn())
    {
      $id_author = $_POST["id_author"];
      $name = $_POST["name"];
      $surname = $_POST["surname"];
      $nationality = $_POST["nationality"];
      $biography = $_POST["biography"];

      if(!empty($id_author)){
        $this->model->editarAutor($id_author, $name, $surname, $nationality, $biography);
      }else{
        $this->model->guardarAutor($name, $surname, $nationality, $biography);
      }
      echo json_encode(['message' => 'El Autor se guardo exitosamente.']);
    }else{
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function deleteAuthor($params)
  {
    if(UserModel::isLoggedIn()){
      $id_author = $params[0];
      try {
        if ($this->model->borrarAutor($id_author)) {
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

  public function editAuthor($params)
  {
    if (UserModel::igLoggedIn()) {
      $id_author = $params[0];
      $author = $this->model->getAutor($id_author);
      $this->view->showCreateAuthor($author);
    }else{
      header('Location: ' . HOME);
    }
  }
}
?>
