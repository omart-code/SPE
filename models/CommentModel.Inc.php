<?php

    class CommentModel{

        //Devuelve todos los comentarios de una estancia
        public static function getComments($conn, $id_estancia){
            $comments = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Comment.inc.php';
                    $sql = "SELECT * FROM comentarios c WHERE c.id_estancia = :id_estancia";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $comment){
                            $comments[] = new Comment(
                                $comment['id_comentario'], $comment['mensaje'], $comment['fecha'], $comment['tipo'], $comment['id_estancia'], $comment['categoria'] );
                            }}else{
                                print 'No hi ha comentaris disponibles';
                            }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $comments;
        }

        
        //Devuelve todos los comentarios públicos de una estancia
        public static function getPublicComments($conn, $id_estancia){
            $comments = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Comments.inc.php';
                    $sql = "SELECT * FROM comentarios c WHERE c.id_estancia = :id_estancia AND c.tipo = público";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $comment){
                            $comments[] = new Comment(
                                $comment['id_comentario'], $comment['mensaje'], $comment['fecha'], $comment['tipo'], $comment['id_estancia'], $comment['categoria'] );
                            }}else{
                                print 'No hi ha comentaris disponibles';
                            }
                }catch (PDOException $ex){
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
            return $comments;
        }
       
    }

?>