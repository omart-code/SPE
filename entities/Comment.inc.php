<?php

class Comment {

    private $id_comentario;
    private $mensaje;
    private $fecha;
    private $tipo;
    private $id_estancia;
    private $categoria;
   
    public function __construct($id_comentario, $mensaje, $fecha,  $tipo,  $id_estancia,  $categoria){
        $this -> id_comentario = $id_comentario;
        $this -> mensaje = $mensaje;
        $this -> fecha = $fecha;
        $this -> tipo = $tipo;
        $this -> id_estancia = $id_estancia;
        $this -> categoria = $categoria;
        
       
    }

    public function getCommentId(){
        return $this -> id_comentario;
    }

    public function getCommentMessage(){
        return $this -> mensaje;
    }
    public function getCommentDate(){
        $fecha = DateTime::createFromFormat('Y-m-d', $this->fecha);
        $fecha = $fecha->format('d-m-Y');
        return $fecha;
    }

    public function getCommentType(){
        return $this -> tipo;
    }

    public function getCommentInternshipId(){
        return $this -> id_estancia;
    }

    public function getCommentCategory(){
        return $this -> categoria;
    }



    public function setCommentId($id_comentario){
        $this->id_comentario = $id_comentario;
    }

    public function setCommentMessage($mensaje){
        $this->mensaje = $mensaje;
    }
    public function setCommentDate($fecha){
        $this->fecha = $fecha;
    }
    public function setCommentType($tipo){
        $this->tipo = $tipo;
    }
    public function setCommentInternshipId($id_estancia){
        $this->id_estancia = $id_estancia;
    }
    public function setCommentCategory($categoria){
        $this->categoria = $categoria;
    }
   
}

?>