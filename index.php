<?php

$comps = parse_url($_SERVER["REQUEST_URI"]);

$route = $comps['path'];

$parts = explode("/", $route);

if($parts[1] == 'spe'){
    include_once 'views/home.php';
}else if($parts[2] == 'login'){
    include_once 'views/login.php';
}else{
    echo '404 error';

} 

//Vigila esto que ha hecho es un principio de enrutador, pero esta inacabado, video 35 a ver como lo soluciona. Aun falta arreglar logout..


?>