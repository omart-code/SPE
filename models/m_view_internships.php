<?php
require_once dirname( __DIR__ ) . '/models/m_connection.php';


//function that returns the internships of a teacher
function getInternships($niu){
    $conn = connection();
    $query = $conn->query("SELECT * FROM estancias WHERE niu_profesor  = '$niu'");

    $internships = [];

    $i = 0;
    while($row = $query->fetch_assoc()){
        $internships[$i] = $row;
        $i++;
    }
    
    return $internships;
}
?>