<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include __DIR__ . '../../includes/libraries.php'; ?>
</head>
<body>

    <div class="wrapper fadeInDown md-5 p-5">
  <div id="formContent">
   
    <!-- Login Form -->
    <!--<form method="POST" action="/SPE/controllers/c_login_done.php"> -->$_COOKIE
    <form method="POST" action="../spe/index.php?action=login_done">
      <input type="text" id="niu" class="fadeIn second" name="niu" placeholder="niu">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<?php include __DIR__ . '../../includes/footer.php'; ?>
</body>
</html>
