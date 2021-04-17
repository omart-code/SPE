<?php 
include_once 'includes/libraries.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Connection.inc.php';
$title = 'INDEX';
include_once 'includes/doc-declaration.inc.php'; ?>
<body>
<?php include_once './includes/navbar.inc.php'; ?>
        <div class="container">
        <h1>BENVINGUT A LA EINA DE SEGUIMENT DE PRÀCTIQUES EXTERNES</h1>

        <h3>Navega-hi per la barra de navegació per a consultar dades</h3>
        </div>
     
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
