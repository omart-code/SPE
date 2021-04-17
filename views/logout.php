<?php

include_once '../app/config.inc.php';
include_once '../app/Connection.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../app/Session.inc.php';

ControlSession::closeSession();
Redirection::redirect(LOGIN);


?>