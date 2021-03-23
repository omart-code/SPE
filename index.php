<?php
$action = '';
session_start();
if(isset($_GET['action'])) {
    $action = $_GET['action'];
}


//router
switch ($action) {

        case 'view-teacher':
            include __DIR__ . '/controllers/c_teacher.php';
            break;

        case 'view-student':
            include __DIR__ . '/controllers/c_student.php';
            break;

        case 'view-internships':
            include __DIR__ . '/controllers/c_view_internships.php';
            break;


        case 'login_done':
            include __DIR__ . '/controllers/c_login_done.php';
            break;

        case 'logout':
            include __DIR__ . '/controllers/c_logout.php';
            break;

        default:
        include __DIR__ . '/controllers/c_login.php';
        break;

}

?>