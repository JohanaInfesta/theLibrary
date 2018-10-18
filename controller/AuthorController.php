<?php
include_once('model/AuthorModel.php');
include_once('model/BookModel.php');
include_once('view/AuthorView.php');

class AutorController extends Controller
{

  function __construct()
  {
    $this->view = new AutoresView();
    $this->model = new AutoresModel();
    $this->mangaModel = new LibrosModel();
  }

  public function index()
  {

  }


}
?>
