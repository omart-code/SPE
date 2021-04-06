<?php

    class DepartmentModel{

        //Inserta un nuevo departamento
        public static function insertDepartment($conn, $nombre, $siglas ){
           
    
            if(isset($conn)){
                try{
                    include_once '../entities/Department.inc.php';
                    $sql = "INSERT INTO departamentos (nombre, siglas)
                    VALUES (:nombre, :siglas)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':siglas', $siglas, PDO::PARAM_STR);
                   
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
           
        }
       
    }

?>