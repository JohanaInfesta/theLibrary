<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        //Configuración para url's items

        //Configuración para url's autores
        'listaAutores' => 'AuthorController#index',
        'contenidoAutores' => 'AuthorController#booksByAuthor',
        'crearAutor' => 'AuthorController#createAuthor',
        'guardarAutor' => 'AuthorController#saveAuthor',
        'eliminarAutor' => 'AuthorController#deleteAuthor',
        'editAutor' => 'AuthorController#editAuthor',

        //Configuración para url's login, logout y verificaciones
        //'login' => 'LoginController#index',
        //'registro' => 'LoginController#registro',
        // 'logout' => 'LoginController#destroy',
        // 'verificarUsuario' => 'LoginController#verify',
        // 'crearUsuario' => 'LoginController#create',
        // 'eliminarUsuario' => 'LoginController#delete',
        // 'adminUsers' => 'LoginController#listaUsers',
        // 'permisoSuperUser' => 'LoginController#superUser'
    ];

}

 ?>
