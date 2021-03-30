<?php

class Redirection {
    public static function redirect($url){
        header('location: ' . $url, true, 301);
        die();
    }
}


?>