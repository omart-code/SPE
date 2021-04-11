<?php

class UserModel {

    public static function getUsers($conn){
        $users = array();
        if(isset($conn)){

            try{

                include_once '../entities/User.inc.php';
                $sql = "SELECT * FROM usuarios";
                $stmt = $conn -> prepare($sql);
                $stmt -> execute();
                $res = $stmt->fetchAll();

                if(count($res)){
                    foreach($res as $user){
                        $users[] = new User(
                            $user['niu'], $user['password'], $user['nombre'], $user['apellido'], $user['email'], $user['telefono'], $user['id_tipo_usuario']
                        );
                    }
                 
                }else{
                    print 'No hi ha usuaris disponibles';
                }

                
            }catch(PDOException $ex){
                print 'ERROR'. $ex ->getMessage();
            }
        }
        return $users;
    }

    public static function getNumUsers($conn){
        $numUsers = null;
        if(isset($conn)){
            try {
               $sql = "SELECT COUNT(*) as total FROM usuarios";
               $stmt = $conn -> prepare($sql);
               $stmt -> execute();
               $res = $stmt-> fetch();

               $users_total = $res['total'];

            } catch (PDOException $ex) {
                print 'ERROR'. $ex->getMessage();
            }
        }
        return $users_total;
    }

    public static function getUserByNiu($conn, $niu){
        $user = null;

        if(isset($conn)){
            try{
                include_once '../entities/User.inc.php';
                $sql = "SELECT * FROM usuarios u WHERE u.niu = :niu";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu', $niu, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetch();

                if(!empty($res)){
                    $user = new User( $res['niu'], $res['password'], $res['nombre'], $res['apellido'], $res['email'], $res['telefono'], $res['id_tipo_usuario']);
                }
            }catch (PDOException $ex){
                print 'ERROR'. $ex->getMessage();
            }
        }

        return $user;
    }

        //Inserta un user en la BD
        public static function insertUser($conn,$niu, $nombre, $apellido, $telefono, $email, $id_tipo_usuario){
            
    
            if(isset($conn)){
                try{
                    include_once '../entities/User.inc.php';
                    $sql = "INSERT INTO usuarios (niu, nombre, apellido, telefono, email, id_tipo_usuario)
                    VALUES (:niu, :nombre, :apellido, :telefono, :email, :id_tipo_usuario)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu', $niu, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                    $stmt ->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                    $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_tipo_usuario', $id_tipo_usuario, PDO::PARAM_STR);
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
           
        }
   

}

?>