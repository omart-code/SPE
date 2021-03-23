<?php

include __DIR__ . '../../models/m_login.php';
session_start();
$niu = $_POST['niu'];
$password = $_POST['password'];


$u = login($niu, $password);

    if(empty($u)){
        echo "El usuario no existe";

    }
    else {
         
            if ($u[0]['id_tipo_usuario'] == '1'){
                $_SESSION['user'] = $u[0];
                echo "entra en user tipo 1";
                header('Location: ../spe/controllers/c_teacher.php');
            }
            elseif ($u[0]['id_tipo_usuario'] == '2'){
                echo "entra en user tipo 2";
                $_SESSION['user'] = $u[0];
                header('Location: ../spe/controllers/c_student.php');
            }//falta coordinador y admin
            else{
            var_dump($u) ;
            echo "Contraseña incorrecta";

        }
    }


?>