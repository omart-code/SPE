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
       
    }

?>