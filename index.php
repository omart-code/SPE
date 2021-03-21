<?php
$action = '';

if(isset($_GET['action'])) {
    $action = $_GET['action'];
}


//router
switch ($action) {

    case 'main':
        include __DIR__ . '/controllers/c_teacher.php';
        break;

        default:
        include __DIR__ . '/controllers/c_teacher.php';
        break;

}

?>