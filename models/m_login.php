<?php
require_once ('models/m_connection.php');

$niu = $_POST['niu'];
$password = $_POST['password'];

//function that returns the user data that want to do a login
function login($niu, $password){
    $conn = connection();
   
    $query = $conn->query("SELECT * FROM usuarios WHERE niu  = '$niu' AND password = '$password'");

   
    $i = 0;
    while($row = $query->fetch_assoc()){
        $user[$i] = $row;
        $i++;
    }

    //var_dump($usuario);
    return $user;
}






?>