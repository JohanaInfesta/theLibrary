<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        //Configuración para url's items
        'booksList' => 'BookController#index',
        'book' => 'BookController#index',
        //Configuración para url's categorias

        //Configuración para url's login, logout y verificaciones
        'login' => 'LoginController#index',
        'registro' => 'LoginController#registro',
        'logout' => 'LoginController#destroy',
        'verifyUser' => 'LoginController#verify',
        'addUser' => 'LoginController#create',
        'deleteUser' => 'LoginController#delete',
        'adminUsers' => 'LoginController#listaUsers',
        'permisoSuperUser' => 'LoginController#superUser'
    ];

}

 ?>
