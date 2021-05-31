<?php
include_once '../app/config.inc.php';
include_once '../app/Connection.inc.php';
include_once '../includes/libraries.inc.php';
include_once '../app/LoginValidator.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/doc-declaration.inc.php';
include_once '../app/Session.inc.php';
?>

<div class="container mt-10">
<div class="card  text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">Sembla ser que tens dos rols</h5>
    <p class="card-text">Amb quin rol desitjes accedir a la aplicació?</p>
    <a href="../views/v_teacher.php" class="btn btn-success">Professor</a>
    <a href="../views/v_coordinator.php" class="btn btn-success">Coordinador</a>
  </div>
</div>
</div>

