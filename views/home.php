<?php 
include_once 'includes/libraries.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Connection.inc.php';
$title = 'INDEX';
include_once 'includes/doc-declaration.inc.php'; 
include_once 'includes/navbar.inc.php'?>

<body>
        <br>
        <div class="container-fluid text-center" style="width:80%;">
        <h1>Benvingut a la eina de seguiment de les pràctiques externes</h1>

        <h2>Accedeix al sistema fent login a la aplicacició</h2>
     
        <?php
        /* include_once 'app/Connection.inc.php';
        include_once 'app/UserRepository.inc.php';
        Connection::openConnection();
        $NumUsers = UserRepository::getNumUsers(Connection::getConnection());
        print('Hi ha '.$NumUsers. ' usuaris a la base de dades' );
        Connection::closeConnection(); */
        ?>
      


</body>
</html>
