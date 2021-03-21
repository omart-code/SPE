<?php
require('models/m_connection.php');

//function that returns the users from the db
function getUsers(){
    $conn = connection();
    $query = $conn->query('SELECT * FROM usuaris');

    $users = [];

    $i = 0;
    while($row = $query->fetch_assoc()){
        $users[$i] = $row;
        $i++;
    }
    
    return $users;
}
?>