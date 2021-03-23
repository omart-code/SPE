<?php

require('../models/m_teacher.php'); //te has quedado que falla en el require no sabes por que ya casi carga la vista...

$users = getUsers();

require('../views/v_teacher.php');

?>