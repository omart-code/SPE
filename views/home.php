<?php 
include_once 'includes/libraries.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Connection.inc.php';
$title = 'INDEX';
include_once 'includes/doc-declaration.inc.php'; ?>
<body>
<?php include_once './includes/navbar.inc.php'; ?>
        <h1>INDEX</h1>
        <?php
        /* include_once 'app/Connection.inc.php';
        include_once 'app/UserRepository.inc.php';
        Connection::openConnection();
        $NumUsers = UserRepository::getNumUsers(Connection::getConnection());
        print('Hi ha '.$NumUsers. ' usuaris a la base de dades' );
        Connection::closeConnection(); */
        ?>
      
<?php include_once 'includes/footer.inc.php'; ?>

</body>
</html>
