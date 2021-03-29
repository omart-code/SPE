<?php
include_once 'includes/libraries.inc.php';
$title = 'Login';
include_once 'includes/doc-declaration.inc.php';

?>

  <div class="wrapper fadeInDown md-5 p-5">
  <div id="formContent">
   
    <!-- Login Form -->
   <h1>Login</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <input type="text" id="niu" class="fadeIn second" name="niu" placeholder="niu" required>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Olvidaste de la contraseña?</a>
    </div>

  </div>
</div>
<?php include_once 'includes/footer.inc.php'?>
</body>
</html>
