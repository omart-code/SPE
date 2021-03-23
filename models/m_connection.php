<?php
//function that allows the connection to the database
function connection(){
   $conn = new mysqli('localhost', 'root', '' , 'spext');
   return($conn);
}  

?>