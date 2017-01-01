<?php

  class Disponibilidad{
    public $hora;
    public $dia01;
    public $dia02;
    public $dia03;
    public $dia04;
    public $dia05;
    public $dia06;
    public $dia07;
    public $fecha01;
    public $fecha02;
    public $fecha03;
    public $fecha04;
    public $fecha05;
    public $fecha06;
    public $fecha07;
    public $estado01;
    public $estado02;
    public $estado03;
    public $estado04;
    public $estado05;
    public $estado06;
    public $estado07;

    public function getIdFecha01(){
        return "D-". $this->fecha01 . "-H". substr($this->hora,0,2);
    }

    public function getIdFecha02(){
        return "D-". $this->fecha02 . "-H". substr($this->hora,0,2);   
    }

    public function getIdFecha03(){
        return "D-". $this->fecha03 . "-H". substr($this->hora,0,2);
    }

    public function getIdFecha04(){
        return "D-". $this->fecha04 . "-H". substr($this->hora,0,2);
    }

    public function getIdFecha05(){
        return "D-". $this->fecha05 . "-H". substr($this->hora,0,2);
    }

    public function getIdFecha06(){
        return "D-". $this->fecha06 . "-H" . substr($this->hora,0,2);
    }

    public function getIdFecha07(){
        return "D-". $this->fecha07 . "-H" . substr($this->hora,0,2);
    }
  }

?>