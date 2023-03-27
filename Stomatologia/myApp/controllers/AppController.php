<?php

class AppController extends Controller
{

    protected $routes = ['stomatologie' => 'StomatologieController',
                        'intrebari' => 'IntrebariController',
                        'consultatie' => 'ConsultatieController',
                        'login' => 'LoginController',
                        'logout' => 'LogoutController',
                        'signup' => 'SignupController',
                        'bunvenit' => 'BunVenitController'
                        ];

    public function __construct(){
        $this->init();
    }

    public function init(){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        else {
            $page = 'stomatologie';
        }

        if(array_key_exists($page, $this->routes)){
            $className = $this->routes[$page];
        }
        else {
            $className = $this->routes['stomatologie'];
        }
        new $className;
    }
}