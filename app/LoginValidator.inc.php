<?php
include_once '../models/UserModel.inc.php';

class LoginValidator{
   
    private $user;
    private $error;

    public function __construct($niu, $password, $conn){
        $this->error = '';
      
        if(!$this ->varDefined($niu) || !$this->varDefined($password)){
            $this->user = null;
            $this -> error = "Has d'introduir niu i paraula de pas";
        }else{
            $this -> user = UserModel::getUserByNiu($conn, $niu, $password);
            if(is_null($this->user) || $password !== $this->user->getUserPassword()){
                $this->error = "Dades incorrectes" ;
            }
        }


    }

    //Comprueba si variable iniciada
    private function varDefined($variable){
        if(isset($variable) && !empty($variable)){
            return true;
        }else{
            return false;
        }
    }

    public function getUser(){
        return $this->user;
    }

    public function getError(){
        return $this->error;
    }

    public function showError(){
        if($this->error !==''){
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }


}

?>