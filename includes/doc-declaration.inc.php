<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript" src="../js/showTasks.js"></script>
    <script type="text/javascript" src="../js/showEditMessage.js"></script>
    <script type="text/javascript" src="../js/restoreMessage.js"></script>
    <script type="text/javascript" src="../js/taskDone.js"></script>
    <?php
    if(!isset($title) || empty($title)){
      $title = 'SPE';
    }
     echo "<title>$title</title>" 
     ?>
</head>
