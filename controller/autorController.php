<?php
include_once('model/AutoresModel.php');
include_once('model/LibrosModel.php');
include_once('view/AutoresView.php');

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
