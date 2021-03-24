<?php

//Clase Core

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod= 'index';
    protected $params = [];

    public function __construct() {
       $url = $this->getUrl();

       //Miramos en controladores el primer valor con ucwords hara mayuscula la primera letra
       if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){

        //Nuevo controlador seteado
          $this->currentController = ucwords($url[0]);
          unset($url[0]);
       }

       //Requeriemos el controlador

       require_once '../app/controllers/' . $this->currentController . '.php';
       $this->currentController = new $this->currentController;

       //Miramos la siguiente parte de la url
       if(isset($url[1])){
           if(method_exists($this->currentController, $url[1])){
               $this->currentMethod = $url[1];
               unset($url[1]);

           }
       }

       //Obtenemos los parametros, si no hay lo devuelve vacio
       $this->params = $url ? array_values($url) : [];


       //Llamamos a un callback con el array de parametros
       call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url =  rtrim($_GET['url'], '/');

            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}