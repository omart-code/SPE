<?php

    class DegreeModel{

        //Obtener todos los grados dispoonibles
        public static function getDegrees($conn){
           
    
            $degrees = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Degree.inc.php';
                    $sql = "SELECT * FROM grados";
                    $stmt = $conn -> prepare($sql);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $degree){
                            $degrees[] = new Degree(
                                $degree['id_grado'], $degree['nombre'], $degree['siglas'], $degree['horas'], $degree['codigo_asignatura']);
                        } 
                     }else{
                            print 'No hi ha graus disponibles';
                        }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degrees;
    
           
        }

         //Devuelve un grado a partir del nombre
         public static function getDegreeByName($conn, $nombre){
            $degree = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Degree.inc.php';
                    $sql = "SELECT * FROM grados WHERE nombre = :nombre";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $degree = new Degree( $res['id_grado'],$res['nombre'],$res['siglas'], $res['horas'], $res['codigo_asignatura']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degree;
        }

        public static function getDegreeById($conn, $id_grado){
            $degree = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Degree.inc.php';
                    $sql = "SELECT * FROM grados WHERE id_grado = :id_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $degree = new Degree( $res['id_grado'],$res['nombre'],$res['siglas'], $res['horas'], $res['codigo_asignatura']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $degree;
        }

        public static function insertDegree($conn, $nombre, $siglas, $codigo_asignatura ){
           
    
            if(isset($conn)){
                try{
                   
                    $sql = "INSERT INTO grados (nombre, siglas, codigo_asignatura)
                    VALUES (:nombre, :siglas, :codigo_asignatura)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':siglas', $siglas, PDO::PARAM_STR);
                    $stmt ->bindParam(':codigo_asignatura', $codigo_asignatura, PDO::PARAM_STR);
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

         
       
    }

?>