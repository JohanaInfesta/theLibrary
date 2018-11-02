<?php

require_once 'JSONView.php';

abstract class ApiController {

  protected $model;
  protected $view;

  private $raw_data;

  public function __construct() {

    $this->view = new JSONView();
    $this->raw_data = file_get_contents("php://input");
  }

  protected function getData(){
    return json_decode($this->raw_data);
  }

}

?>
