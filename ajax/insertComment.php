<?php
include_once '../app/Connection.inc.php';
include_once '../controllers/CommentController.inc.php';


            $tipoComentario=$_POST['tipoComentario'];
            $categoriaComentario=$_POST['categoriaComentario'];
            $comentario=$_POST['comentario'];
            $internshipId=$_POST['internshipId'];
            $niuStudent=$_POST['niuStudent'];



            Connection::openConnection(); 
            CommentController::insertComment(Connection::getConnection(),$comentario, $tipoComentario,$internshipId, $categoriaComentario);
            echo '<script> window.location.replace("'.VIEWINTERNSHIP."?niu=".$niuStudent.'")</script>';

?>