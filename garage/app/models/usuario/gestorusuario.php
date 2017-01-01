<?php
  //session_start();
  if(!isset($_SESSION)) {
       session_start();
  }
  require_once("usuario.php");

  class GestorUsuario{
    private static $instance;

    public static function getInstance(){
      if (self::$instance == null){
        self::$instance = new GestorUsuario();
      }
      /*
      if(!isset($_SESSION["usuarioReserva"])){
        $_SESSION["usuarioReserva"] = array();
      }
      */
      return self::$instance;      
    }

    public function estaLogeadoElUsuario(){
      if(isset($_SESSION["usuarioReserva"])){
        return true;
      }else{
        return false;
      }
    }

    public function validarUsuario(Usuario $usuarioRequest, Usuario $usuario){
      if($usuario != null){
        if($usuario->password == $usuarioRequest->password){
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
    }

    public function setUsuarioReserva(Usuario $usuario){
      $usuarioSession = (array)$usuario;
      $_SESSION["usuarioReserva"] = $usuarioSession;
    }

    public function clearUsuarioReserva(){
      unset($_SESSION["usuarioReserva"]);
    }

    public function getUsuarioReserva(){
      $usuarioSession  =$_SESSION["usuarioReserva"];

      $usuario = new Usuario();
      $usuario->idUsuario = $usuarioSession["idUsuario"];
      $usuario->email = $usuarioSession["email"];
      $usuario->nombre= $usuarioSession["nombre"];
      $usuario->tipoUsuario = $usuarioSession["tipoUsuario"];

      return $usuario;
    }
  }
?>