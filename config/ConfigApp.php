<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
        ''=> 'IndexController#index',
        //Configuración para url's items

        //Configuración para url's categorias
        'listaLibros' => 'LibrosController#index',

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
