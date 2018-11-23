<?php
require_once 'Api.php';
class ApiSecuredController extends Api
{
    private $logged;
    private $admin;
    public function __construct()
    {
        parent::__construct();
        session_start();
        if(isset($_SESSION['Usuario'])){
            $this->logged = true;
            if ($_SESSION['Admin'] == 1)
                $this->admin = true;
            else
                $this->admin = false;
        }else{
            $this->logged = false;
            $this->admin = false;
        }
    }
    function Logueado(){
        return $this->logged;
    }
    function esAdmin(){
        return $this->admin;
    }
}
 ?>
