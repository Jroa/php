<?php

  class TarifaDia{
    public $dia;
    public $hora;
    public $precio;


    public function __construct($dia, $hora, $precio){
      $this->dia = $dia;
      $this->hora = $hora;
      $this->precio = $precio;
    }
  }
?>