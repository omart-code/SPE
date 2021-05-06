<?php

    class DegreeDepartmentModel{

        //Inserta un nuevo departamento_grado
        public static function insertDegreeDepartment($conn, $id_departamento, $id_grado ){
           
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeDepartment.inc.php';
                    $sql = "INSERT INTO departamentos_grado (id_departamento, id_grado)
                    VALUES (:id_departamento, :id_grado)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_departamento', $id_departamento, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                   
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

    }

?>