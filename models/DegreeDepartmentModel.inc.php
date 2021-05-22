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

        public static function getDepartmentsByDegree($conn, $id_grado){
           
    
            $departments = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeDepartment.inc.php';
                    $sql = "SELECT d.nombre, d.id_departamento, d.siglas, dg.id_grado
                    FROM departamentos_grado dg
                    INNER JOIN departamentos d ON d.id_departamento = dg.id_departamento
                    WHERE dg.id_grado = :id_grado;";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $depart){
                            $departments[] = $depart;
                        } 
                     }else{
                            print 'No hi ha departaments disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $departments;
    
           
        }

    }

?>