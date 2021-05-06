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
                                $comments = null;
                            }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $comments;
        }

        
        //Devuelve todos los comentarios públicos de una estancia
        public static function getPublicComments($conn, $id_estancia){
            $comments = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Comment.inc.php';
                    $sql = "SELECT * FROM comentarios c WHERE c.id_estancia = :id_estancia AND c.tipo = 1";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $comment){
                            $comments[] = new Comment(
                                $comment['id_comentario'], $comment['mensaje'], $comment['fecha'], $comment['tipo'], $comment['id_estancia'], $comment['categoria'] );
                            }}else{
                               $comments = null;
                            }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $comments;
        }

         //Inserta un comentario
         public static function insertComment($conn, $mensaje, $tipo, $id_estancia, $categoria ){
           
            $fecha = date("Y-m-d");
            if($tipo == 'Públic'){
                $tipo = 1;
            }else{
                $tipo = 2;
            }
            if(isset($conn)){
                try{
                    include_once '../entities/Comment.inc.php';

                    $sql = "INSERT INTO comentarios (mensaje, fecha, tipo, id_estancia, categoria)
                    VALUES (:mensaje, :fecha, :tipo, :id_estancia, :categoria)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
                    $stmt ->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                    $stmt ->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_estancia', $id_estancia, PDO::PARAM_STR);
                    $stmt ->bindParam(':categoria', $categoria, PDO::PARAM_STR);
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }
       
    }

?>