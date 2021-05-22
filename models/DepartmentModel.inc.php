<?php

    class DepartmentModel{

        //Inserta un nuevo departamento
        public static function insertDepartment($conn, $nombre, $siglas, $identificador ){
           
    
            if(isset($conn)){
                try{
                    include_once '../entities/Department.inc.php';
                    $sql = "INSERT INTO departamentos (nombre, siglas, identificador)
                    VALUES (:nombre, :siglas, :identificador)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':siglas', $siglas, PDO::PARAM_STR);
                    $stmt ->bindParam(':identificador', $identificador, PDO::PARAM_STR);
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
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
                                $depart['id_departamento'], $depart['nombre'], $depart['siglas'], $depart['identificador']);
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
                        $department = new Department( $res['id_departamento'],$res['nombre'],$res['siglas'], $res['identificador']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $department;
        }

        public static function getDepartmentById($conn, $id_departamento){
            $department = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Department.inc.php';
                    $sql = "SELECT * FROM departamentos WHERE id_departamento = :id_departamento";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_departamento', $id_departamento, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $department = new Department( $res['id_departamento'],$res['nombre'],$res['siglas'], $res['identificador']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
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
                    $sql = "SELECT d.id_departamento, d.nombre, d.siglas
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

        public static function getDepartmentsInfo($conn, $id_curso_grado){
            $deptsInfo = null;
        
            if(isset($conn)){
                try{
                   
                    $sql = "SELECT d.nombre as nombre_departamento, d.siglas as siglas, SUM(pc.estudiantes_asignados) as estudiantes_asignados, SUM( pc.max_estudiantes) as max_estudiantes FROM profesores p INNER JOIN departamentos d ON d.id_departamento = p.id_departamento INNER JOIN profesores_curso_grado pc ON pc.niu_profesor = p.niu_profesor WHERE pc.id_curso_grado = :id_curso_grado GROUP BY d.nombre ";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $dept){
                            $deptsInfo[] = $dept;
                        } 
                     }else{
                            print 'No hi ha informació de departaments disponible';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $deptsInfo;
        }

        public static function removeDepartment($conn, $id_departamento){
            if(isset($conn)){
                $sql = "DELETE FROM departamentos WHERE id_departamento = :id_departamento";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':id_departamento', $id_departamento, PDO::PARAM_STR);
                $stmt -> execute();
            }
        }
       
       
    }

?>