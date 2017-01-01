<?php
  require_once('persona.php');

  class DemoDao{
    private $persona;
    private $listaPersonas;

    public function __construct(){
      $this->listaPersonas = array();
    }

    public function getPersonas(){
      $persona = new Persona();
      $persona->nombre="Nombre 01";
      $persona->apellido="Apellido 01";

      array_push($this->listaPersonas, $persona);

      $persona = new Persona();
      $persona->nombre="Nombre 02";
      $persona->apellido="Apellido 02";

      array_push($this->listaPersonas, $persona);

      return $this->listaPersonas;
    }
  }
?>