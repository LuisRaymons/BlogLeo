<?php
  include_once("config.php");
  class Conexion{
    private $con;
    public function conectar(){
      $this->con = new mysqli(__SERVER__,__USER__,__PASSWORD__,__BD__);
      return $this->con;
    }

    public function desconectar(){
        $this->con = null;
    }
  }

 ?>
