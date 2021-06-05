<?php

    class CoordinatorModel{

        //Devuelve el coordinador logueado
        public static function getCoordinatorByNiu($conn, $niu_coordinador){
           $coord = [];
    
            if(isset($conn)){
                try{
                    include_once '../entities/Coordinator.inc.php';
                    $sql = "SELECT * FROM coordinadores  WHERE niu_coordinador = :niu_coordinador";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_coordinador', $niu_coordinador, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
                    
                    if(!empty($res)){
                        $coord = new Coordinator( $res['niu_coordinador'], $res['id_grado']);
                    }
                }catch (PDOException $ex){
                    
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $coord;
        }

        public static function getCoordinatorsAndDegrees($conn){
            
            $coordinators = null;
    
            if(isset($conn)){
                try{
                    
                    $sql = "SELECT u.nombre, u.apellido, c.id_grado, g.nombre as grado
                    FROM coordinadores c
                    INNER JOIN grados g ON g.id_grado = c.id_grado
                    INNER JOIN usuarios u  ON c.niu_coordinador = u.niu
                    WHERE u.id_tipo_usuario = 3 OR u.id_tipo_usuario2 = 3";
                    $stmt = $conn -> prepare($sql);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $coord){
                            $coordinators[] = $coord;
                        } 
                     }else{
                            print 'No hi ha coordinadors disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $coordinators;
    
        }

        public static function insertCoordinator($conn, $niu_coordinador, $id_grado){
            if(isset($conn)){
                try{
                    include_once '../entities/Coordinator.inc.php';
                    $sql = "INSERT INTO coordinadores (niu_coordinador, id_grado)
                    VALUES (:niu_coordinador, :id_grado)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_coordinador', $niu_coordinador, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                  
                   
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
        }

        
       
    }

?>