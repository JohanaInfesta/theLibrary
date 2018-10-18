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
    $this->mangaModel = new BookModel();
    //$this->i_model = new ImagenesModel();
  }

  public function index(){
    $author = $this->model->getAutores();
    $this->view->mostrarAutores($author);
  }

  public function create(){
    $this->view->mostrarCrearAutor();
  }

  public function librosPorAutor(){
    $id_author = $_POST['id_author'];
    $author = $this->model->getAutor($id_author);
    $book = $this->BookModel->getBooks($id_author);//comprobar que sea getBooks el nombre la function
    foreach ($books as $k => $book) {
      $books[$k]["imagenes"] = $this->i_model->getImagenes($book["id_book"]);//comprobar nombre funcion
    }
    $this->view->mostrarLibrosPorAutor();//falta hacer esta funcion
  }

  public function saveAuthor()
  {
    if(UserModel::isLoggedIn())
    {
      $id_author = $_POST["id_author"];
      $name = $_POST["nombre"];
      $surname = $_POST["apellido"];
      $nationality = $_POST["nacionalidad"];
      $biography = $_POST["biografia"];

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
      } catch (\Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
      }

    }else{
      echo json_encode(['error' => 'Usted no tiene permisos para realizar esta operación.']);
    }
  }

  public function editAutor($params)
  {
    if (UserModel::igLoggedIn()) {
      $id_author = $params[0];
      $author = $this->model->getAutor($id_author);
      $this->view->mostrarCrearAutor($author);
    }else{
      header('Location: ' . HOME);
    }
  }
}
?>
