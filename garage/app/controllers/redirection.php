<?php
  if(!isset($_SESSION)) {
       session_start();
  }

  class Redirection{
    
    private static $ultimaPagina;

    public static function confirmarReserva(){
      header("Location: app.php?controller=reserva&action=confirmar");
    }
    
    public static function inicio(){
      header("Location: index.php"); 
    }

    public static function mantenimientoTarifa(){
      header("Location: app.php?controller=tarifa&action=index"); 
    }

    public static function setUltimaPagina(){
      $_SESSION["ultimaPagina"] = $_SERVER['REQUEST_URI'];
    }

    public static function getUltimaPagina(){
      if (isset($_SESSION["ultimaPagina"])){
        return $_SESSION["ultimaPagina"];;
      }else{
        return "";
      }
    }

    public static function paginaAnterior(){
      if (isset($_SESSION["ultimaPagina"])){
        self::$ultimaPagina = $_SESSION["ultimaPagina"];
      }else{
        self::$ultimaPagina = "";
      }
      header("Location: ".self::$ultimaPagina);
    }
  }

?>