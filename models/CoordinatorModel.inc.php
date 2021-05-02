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
                    
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $coord;
        }

        
       
    }

?>