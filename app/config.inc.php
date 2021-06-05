<?php

//rutas
define("SERVER", "http://localhost/spe");
define("LOGIN", SERVER."/views/login.php");
define("LOGOUT", SERVER."/views/logout.php");
define("TEACHER", SERVER."/views/v_teacher.php?rol=teacher");
define("STUDENT", SERVER."/views/v_student.php?rol=student");
define("COORDINATOR", SERVER."/views/v_coordinator.php?rol=coordinator");
define("CHOOSE", SERVER."/views/v_chooseProfile.php");
define("INTERNSHIPS", SERVER."/views/v_view_internships.php?rol=coordinator");
define("VIEWINTERNSHIP", SERVER."/views/v_view-internship.php?rol=teacher");
define("VIEWINTERNSHIPCOORD", SERVER."/views/v_view-internship_coord.php?rol=coordinator");
define("TEACHERS", SERVER."/views/v_teachers.php?rol=coordinator");
define("COORDINATORS", SERVER."/views/v_coordinators.php?rol=coordinator");
define("DEPARTMENTS", SERVER."/views/v_departments.php?rol=coordinator");
define("COURSES", SERVER."/views/v_courses.php?rol=coordinator");
define("ADDTEACHER", SERVER."/views/v_insertTeacher.php?rol=coordinator");
define("ASSIGNTEACHER", SERVER."/views/v_asignTeacher.php?rol=coordinator");
define("REMOVETEACHER", SERVER."/views/v_removeTeacher.php?rol=coordinator");
define("MODIFYTEACHER", SERVER."/views/v_modifyTeacher.php?rol=coordinator");
define("ADDDEPARTMENT", SERVER."/views/v_insertDepartment.php?rol=coordinator");
define("REMOVEDEPARTMENT", SERVER."/views/v_removeDepartment.php");
define("MODIFYDEPARTMENT", SERVER."/views/v_modifyDepartment.php?rol=coordinator");
define("ADDCOURSE", SERVER."/views/v_insertCourse.php?rol=coordinator");
define("ADDCOORDINATOR", SERVER."/views/v_insertCoordinator.php?rol=coordinator");
define("TASK", SERVER."/views/v_view_task.php");
//resources
define("CSS", SERVER. "/css/");
define("JS", SERVER. "/js/");
?>