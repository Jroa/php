<?php
  if(!isset($_SESSION)) {
       session_start();
  }
  require_once("sala.php");

  class GestorSala{
    private static $instance;

    public static function getInstance(){
      if (self::$instance == null){
        self::$instance = new GestorSala();
      }

      return self::$instance;      
    }

    public function salaSeleccionada(){
      if(isset($_SESSION["sala"])){
        return true;
      }else{
        return false;
      }
    }

    public function setSala(Sala $sala){
      $salaSession = (array)$sala;
      $_SESSION["sala"] = $salaSession;
    }

    public function clearSala(){
      unset($_SESSION["sala"]);
    }

    public function getSala(){
      if (isset($_SESSION["sala"])){
        $salaSession  =$_SESSION["sala"];

        $sala = new Sala();
        $sala->idSala = $salaSession["idSala"];
        $sala->nombre= $salaSession["nombre"];
        $sala->direccion = $salaSession["direccion"];
        $sala->telefono= $salaSession["telefono"];

      return $sala;
      }else{
        return null;
      }
    }    

  }

?>