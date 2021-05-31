<?php
include_once '../app/config.inc.php';
include_once '../app/Connection.inc.php';
include_once '../includes/libraries.inc.php';
include_once '../app/LoginValidator.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../app/Session.inc.php';


if(ControlSession::sessionStarted()){
  Redirection::redirect(SERVER);
}

if(isset($_POST['enviar'])){
  
  Connection::openConnection(); 
  $validator = new LoginValidator($_POST['niu'], $_POST['password'], Connection::getConnection());
  var_dump($_POST);
  if($validator ->getError() === '' && !is_null($validator ->getUser())){
 //Iniciar sessio
 //Redirigir a la pagina que toque


    ControlSession::startSession($validator->getUser()->getUserNiu(), $validator->getUser()->getUserType(), $validator->getUser()->getUserName());
    if($_SESSION['id_tipo_usuario'] == '1'){
      Redirection::redirect(TEACHER);
    }
    else if ($_SESSION['id_tipo_usuario'] == '2'){
      Redirection::redirect(STUDENT);
    }
    else if ($_SESSION['id_tipo_usuario'] == '3'){
      Redirection::redirect(COORDINATOR);
    }
    else if ($_SESSION['id_tipo_usuario'] == '4'){
      Redirection::redirect(ADMIN);
    }

    

     
    
  }else{
    echo 'inicio KO';
  } 

  Connection::closeConnection();
 
}
$title = 'Login';
include_once '../includes/doc-declaration.inc.php';
?>
<head>
<link rel="stylesheet" href="../css/login.scss">
</head>
<div class="wrapper">
    <form class="form-signin"  method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">       
      <h2 class="form-signin-heading">Accedeix a la aplicació</h2>
      <br>
      <input type="text" class="form-control" name="niu" placeholder="niu"  required="" autofocus="" />
      <?php
        if (isset($_POST['enviar']) && isset($_POST['niu']) && !empty($_POST['niu'])){
          echo 'value="' . $_POST['niu'] . '"';
        }
        ?>
      <br>
      <input type="password" class="form-control" name="password" placeholder="password" required=""/>
      <?php
            if (isset($_POST['enviar'])){
            $validator -> showError();
            }
          ?>
      <br>      
      <button class="btn btn-lg btn-success btn-block" name="enviar" type="submit">Login</button>   
    </form>
  </div>

</body>
</html>

