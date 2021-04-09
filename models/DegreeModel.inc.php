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
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $degrees;
    
           
        }
       
    }

?>