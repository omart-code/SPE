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

         //Obtener todos los departamentos disponibles
         public static function getDepartments($conn){
           
    
            $departments = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Department.inc.php';
                    $sql = "SELECT * FROM departamentos";
                    $stmt = $conn -> prepare($sql);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $depart){
                            $departments[] = new Department(
                                $depart['id_departamento'], $depart['nombre'], $depart['siglas']);
                        } 
                     }else{
                            print 'No hi ha departaments disponibles';
                        }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $departments;
    
           
        }

         //Devuelve un departamento a partir del nombre
         public static function getDepartmentByName($conn, $nombre){
            $department = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Department.inc.php';
                    $sql = "SELECT * FROM departamentos WHERE nombre = :nombre";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $department = new Department( $res['id_departamento'],$res['nombre'],$res['siglas']);
                    }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $department;
        }

         //Devuelve un departamento a partir del nombre
         public static function getDepartmentByDegree($conn, $id_grado){
            $departments = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Department.inc.php';
                    include_once '../entities/DegreeDepartment.inc.php';
                    $sql = "SELECT d.nombre, d.siglas
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
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $departments;
        }
       
       
    }

?>