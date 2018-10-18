<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        //Configuración para url's items

        'listAuthors' => 'AuthorController#index',
        'contentAuthors' => 'AuthorController#booksByAuthor',
        'createAuthor' => 'AuthorController#createAuthor',
        'saverAuthor' => 'AuthorController#saveAuthor',
        'deleteAuthor' => 'AuthorController#deleteAuthor',
        'editAuthor' => 'AuthorController#editAuthor',

        //Configuración para url's autores

        'booksList' => 'BookController#index',
        'book' => 'BookController#index',

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
