<?php
class InternshipModel {

    public static function getStudentInternship($conn, $niu_estudiante){
        $internship = null;

            if(isset($conn)){
                try{
                    include_once '../entities/Internship.inc.php';
                    $sql = "SELECT * FROM estancias e WHERE e.niu_estudiante = :niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();

                    if(!empty($res)){
                        $internship = new Internship(
                            $res['id_estancia'], $res['niu_estudiante'], $res['niu_profesor'], $res['fecha_inicio'], 
                            $res['fecha_fin'], $res['id_tutor_externo'], $res['id_empresa'], $res['nota'], $res['finalizada'],
                            );
                    }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }

            return $internship;
     }

     public static function getTeacherInternships($conn, $niu_profesor){
        $internships = null;

            if(isset($conn)){
                try{
                    include_once '../entities/Internship.inc.php';
                    $sql = "SELECT * FROM estancias e WHERE e.niu_profesor = :niu_profesor";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
                    if(count($res)){
                        foreach($res as $intern){
                            $internships[] = new Internship(
                                $intern['id_estancia'], $intern['niu_estudiante'], $intern['niu_profesor'], $intern['fecha_inicio'], 
                                $intern['fecha_fin'], $intern['id_tutor_externo'], $intern['id_empresa'], $intern['nota'], $intern['finalizada'],
                                );
                        } 
                     }else{
                            print 'No hi ha estancies disponibles';
                        }
                    
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }

            return $internships;
     }

     

}
?>