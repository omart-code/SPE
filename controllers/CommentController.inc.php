<?php
include_once '../models/CommentModel.inc.php';

class CommentController {

    public function getComments($conn, $id_estancia){
    $comments = [];
    $comments = CommentModel::getComments($conn, $id_estancia);
    return $comments;
        
    }

    public function getPublicComments($conn, $id_estancia){
        $comments = [];
        $comments = CommentModel::getPublicComments($conn, $id_estancia);
        return $comments;

    }

}
?>