<?php

//Carga el modelo y la vista

class Controller {
    public function model($model){

        //Requerimos el modelo
        require_once '../app/models/' . $model . '.php';
        //Instanciamos ojeto del modelo
        return new $model();

    }

    //Carga la vista si la encuentra
    public function view($view, $data = []){
        if (file_exists('../app/views' . $view . '.php')){
            require_once '../app/views' . $view . '.php';
        }else{
            die('La vista no existeix');
        }
    }
}