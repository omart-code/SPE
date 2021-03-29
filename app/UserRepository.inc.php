<?php

class UserRepository {

    public static function getUsers($conn){
        $users = array();
        if(isset($conn)){

            try{

                include_once 'User.inc.php';
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
   

}


?>