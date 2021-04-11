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

<div class="container h-100">
<div class="wrapper fadeInDown md-5 p-5">
  <div id="formContent">
   
    <!-- Login Form -->
   <h1>Login</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <input type="text" id="niu" class="fadeIn second" name="niu" placeholder="niu" >
      <?php
        if (isset($_POST['enviar']) && isset($_POST['niu']) && !empty($_POST['niu'])){
          echo 'value="' . $_POST['niu'] . '"';
        }
        ?>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" >
      <?php
            if (isset($_POST['enviar'])){
            $validator -> showError();
            }
          ?>
      <input type="submit" name="enviar" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Olvidaste de la contraseña?</a>
    </div>

  </div>
</div>
</div>

</body>
</html>

