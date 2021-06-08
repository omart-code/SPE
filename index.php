<?php

$comps = parse_url($_SERVER["REQUEST_URI"]);

$route = $comps['path'];

$parts = explode("/", $route);

if($parts[1] == 'spe'){
    include_once 'views/home.php';
}else{
    echo 'FALLA EL INDEX';

} 

?>