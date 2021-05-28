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

        public static function getDepartmentsByDegreeAndDepartment($conn, $id_grado, $id_departamento){
           
    
            $depart = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/DegreeDepartment.inc.php';
                    $sql = "SELECT * FROM departamentos_grado  WHERE id_grado = :id_grado AND id_departamento = :id_departamento";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_departamento', $id_departamento, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    if(count($res)){
                      
                            $depart = $res;
                        
                     }else{
                            print 'No hi ha departaments disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $depart;
    
           
        }

        public static function removeDegreeDepartment($conn, $id_departamento){
            if(isset($conn)){
                $sql = "DELETE FROM departamentos_grado WHERE id_departamento = :id_departamento";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':id_departamento', $id_departamento, PDO::PARAM_STR);
                $stmt -> execute();
            }
        }

    }

?>