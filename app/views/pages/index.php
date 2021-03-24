<?php

foreach ($data['users'] as $user){
    echo "Information: " . $user->nombre. "\n" . $user->email. "\n" .$user->telefono. "\n";
}

?>