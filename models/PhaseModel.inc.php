<?php

    class PhaseModel{

        //Devuelve todas las fases de la bd
        public static function getPhases($conn){
            $phases = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Phase.inc.php';
                    $sql = "SELECT * FROM etapas";
                    $stmt = $conn -> prepare($sql);
                  
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $phase){
                            $phases[] = new Phase(
                                $phase['id_etapa'], $phase['nombre']);
                            }}else{
                                print 'No hi ha etapes disponibles';
                            }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $phases;
        }
       
    }

?>