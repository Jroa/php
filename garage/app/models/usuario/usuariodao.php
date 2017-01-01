<?php
  require_once("models/db/db.php");
  require_once("usuario.php");

  class UsuarioDao{
    private $db;

    public function __construct(){
      $this->db = Db::getInstance();
    }

    public function create(Usuario $usuario){
      $usuario->idUsuario = null;
      $usuario->tipoUsuario="U";
      $sql = "insert into Usuario(idUsuario, email, password, nombre, telefono, tipoUsuario)
      values(:idUsuario, :email,:password,:nombre,:telefono,:tipoUsuario)";


      $stm = $this->db->prepare($sql);
      $parameters = (array)$usuario;
      //unset($parameters["idUsuario"]);
      //print_r($usuario);
      $stm->execute($parameters);
    }

    public function getUsuarioByEmail($email){
      $sql = "select * from Usuario where email = :email";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(":email",$email, PDO::PARAM_STR, 100);
      $stm->execute();
      $stm->setFetchMode(PDO::FETCH_CLASS, "Usuario");
      $usuario = $stm->fetch();
      return $usuario;        
    }
  }
?>