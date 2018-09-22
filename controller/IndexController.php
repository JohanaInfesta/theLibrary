<?php
include_once('view/IndexView.php');

class IndexController extends Controller {

    function __construct()
    {
      $this->view = new IndexView();
    }

    public function index()
    {
      $this->view->mostrarIndex();
    }


}