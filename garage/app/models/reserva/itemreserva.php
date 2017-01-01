<?php
  class ItemReserva{
    public $idSala;
    public $fecha;
    public $hora;
    public $precio;

    public function __construct($idSala,$fecha,$hora,$precio){
      $this->idSala = $idSala;
      $this->fecha = $fecha;
      $this->hora = $hora;
      $this->precio = $precio;
    }

    public function equals(array $item){
      if($this->fecha == $item["fecha"] && 
         $this->hora == $item["hora"]){
        return true;
      } else{
        return false;
      }
    }    
  }
?>