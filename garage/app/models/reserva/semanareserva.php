<?php
  class SemanaReserva{

    public $fecha01;
    public $fecha02;
    public $fecha03;
    public $fecha04;
    public $fecha05;
    public $fecha06;
    public $fecha07;
    public $dia01;
    public $dia02;
    public $dia03;
    public $dia04;
    public $dia05;
    public $dia06;
    public $dia07;
    public $dia01DeSemana;
    public $dia02DeSemana;
    public $dia03DeSemana;
    public $dia04DeSemana;
    public $dia05DeSemana;
    public $dia06DeSemana;
    public $dia07DeSemana;

    public function getNombreDia($numeroDia){
        $nombres = array("1"=>"DOM",
                        "2"=> "LUN",
                        "3"=>"MAR",
                        "4"=>"MIE",
                        "5"=>"JUE",
                        "6"=>"VIE",
                        "7"=>"SAB");

        return $nombres[$numeroDia];
    }
  }
?>