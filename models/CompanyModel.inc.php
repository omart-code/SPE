<?php

    class CompanyModel{

        //Devuelve una empresa buscando por su id
        public static function getCompanyById($conn, $id_empresa){
            $company = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Company.inc.php';
                    $sql = "SELECT * FROM empresas e WHERE e.id_empresa = :id_empresa";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_empresa', $id_empresa, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $company = new Company( $res['id_empresa'], $res['nif'], $res['nombre'], $res['email'], $res['telefono'], $res['direccion'], $res['responsable']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $company;
        }

        public static function updateCompanyNameById($conn, $id_empresa, $nombre){
          
    
            if(isset($conn)){
                try{
                    $sql = "UPDATE empresas SET nombre=:nombre WHERE id_empresa = :id_empresa";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_empresa', $id_empresa, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }
       
    }

?>