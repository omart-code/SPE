<?php

include __DIR__ . '../../models/m_view_internships.php';

$niu = $_SESSION['user']['niu'];
$internships = getInternships($niu);



require_once dirname( __DIR__ ) . '/views/v_view_internships.php';

?>