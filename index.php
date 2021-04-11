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


?>