<?php
  class ReservaImporte{
    public $subTotal;
    public $igv;
    public $total;

    public function __construct($subTotal, $igv, $total){
      $this->subTotal = number_format($subTotal,2);
      $this->igv = number_format($igv,2);
      $this->total = number_format($total,2);
    }
  }

?>