<?php
// require_once 'Api.php';
class ApiSecuredController extends Api
{
    // private $logged;
    // private $admin;

    public function __construct()
    {
        // $user = $_SESSION['USER'];
        parent::__construct();
        // session_start();
        // if(isset($_SESSION['USER'])){
        //     $this->logged = true;
        //     if ($user == 1)
        //         $this->admin = true;
        //     else
        //         $this->admin = false;
        // }else{
        //     $this->logged = false;
        //     $this->admin = false;
        // }
    }
    function getUserLog(){
      session_start();
      $user = $_SESSION['USER'];
      return $user;
    }

    static function isLoggedIn() {
      session_start();
      $isLoggedIn = false;
      if (isset($_SESSION['USER']) && ((time() - (int)$_SESSION['LAST_ACTIVITY']) < 1800)) {
        $isLoggedIn = true;
        $_SESSION['LAST_ACTIVITY'] = time();
      }
      return $isLoggedIn;
    }

    static function isSuperUser(){
      $user = $_SESSION['USER'];
      if ($user)
        return (boolean) $user['is_admin'];
      return false;
    }
}
 ?>
