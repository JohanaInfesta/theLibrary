<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        //Configuración para url's items
        'booksList' => 'BookController#index',
        'book' => 'BookController#description',
        'addBook' => 'BookController#create',
        'editBook' => 'BookController#edit',
        'saveBook' => 'BookController#store',
        'deleteBook' => 'BookController#delete',
        'deleteBookImage' => 'BookController#deleteImage',
        //Configuración para url's autores
        'allAuthors' => 'AuthorController#index',
        'author' => 'AuthorController#booksByAuthor',
        'addAuthor' => 'AuthorController#create',
        'saveAuthor' => 'AuthorController#store',
        'deleteAuthor' => 'AuthorController#delete',
        'editAuthor' => 'AuthorController#edit',
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
