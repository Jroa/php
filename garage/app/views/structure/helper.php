<?php
  require_once("models/usuario/gestorusuario.php");

  class Helper{

    private static $DISPONIBLE="btn btn-info";
    private static $RESERVADO="btn btn-danger";
    private static $SELECCIONADO="btn btn-warning";
    private static $USUARIO;

    public static function getEstilo($estado){
      if($estado == "D"){
        return self::$DISPONIBLE;
      }else if($estado =="R"){
        return self::$RESERVADO;
      }else if ($estado == "S"){
        return self::$SELECCIONADO;
      }else{
        return self::$DISPONIBLE;
      }
    }

    public static function usuarioEstablecido(){
      return GestorUsuario::estaLogeadoElUsuario();
    }

    public static function getNombreUsuario(){
      self::$USUARIO = GestorUsuario::getInstance()->getUsuarioReserva();
      return self::$USUARIO->nombre;
    }

    public static function esAdministrador(){
      if (self::usuarioEstablecido()){
        self::$USUARIO = GestorUsuario::getInstance()->getUsuarioReserva();
        return self::$USUARIO->esAdministrador();      
      }else{
        return false;
      }
    }
  }
?>