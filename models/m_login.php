<?php
require ('models/m_connection.php');

$niu = $_POST['niu'];

function login($niu){
    $conn = connection();
   
    $query = $conn->query("SELECT * FROM usuarios WHERE niu  = '$niu'");

   
    $i = 0;
    while($row = $query->fetch_assoc()){
        $user[$i] = $row;
        $i++;
    }

    //var_dump($usuario);
    return $user;
}






?>