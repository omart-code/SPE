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

        case 'login_done':
            include __DIR__ . '/controllers/c_login_done.php';
            break;

        default:
        include __DIR__ . '/controllers/c_login.php';
        break;

}

?>