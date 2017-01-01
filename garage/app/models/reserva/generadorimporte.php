<?php
  require_once("reservaimporte.php");

  class GeneradorImporte{
    private $itemsReserva;

    public function __construct(array $itemsReserva){
      $this->itemsReserva = $itemsReserva;
    }

    public function getReservaImporte(){
      $total = 0;

      foreach($this->itemsReserva as $item){
        $total = $total + $item->precio;
      }
      $igv = $total * 0.18;
      $subTotal = $total - $igv;

      $reservaImporte = new ReservaImporte($subTotal, $igv, $total);
      return $reservaImporte;
    }
  }

?>