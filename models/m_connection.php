<?php
//function that allows the connection to the database
function connection(){
   $conn = new mysqli('localhost', 'root', '' , 'spe');
   return($conn);
}  

?>