<?php

  class Usuario{
    public $idUsuario;
    public $email;
    public $password;
    public $nombre;
    public $telefono;
    public $tipoUsuario;

    public function esAdministrador(){
      if (strtoupper($this->tipoUsuario)=="A"){
        return true;
      }else{
        return false;
      }
    }
  }
?>