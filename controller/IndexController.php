<?php
include_once('view/IndexView.php');
include_once('model/AuthorModel.php');

class IndexController extends Controller {

    function __construct()
    {
      $this->view = new IndexView();
      $this->model = new Model();
      $this->a_model = new AuthorModel();
    }

    public function index()
    {
      $authors = $this->a_model->getAuthors();
      $this->view->mostrarIndex($authors);
    }


}