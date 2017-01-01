<?php
  require_once("models/db/db.php");
  require_once("tarifa.php");
  require_once("tarifadia.php");

  class TarifaDao{
    private $db;

    public function __construct(){
      $this->db = Db::getInstance();
    }

    public function getTarifas(){
      $listaTarifas = array();
      $stm = $this->db->query("select * from tarifa");
      $stm->setFetchMode(PDO::FETCH_CLASS, "Tarifa");
      $stm->execute();
      $result = $stm->fetchAll();
      foreach ($result as $tarifa){
        array_push($listaTarifas, $tarifa);
      }
      /*
      foreach($result->fetchAll() as $item) {
        $tarifa = new Tarifa(
          $item["hora"],
          $item["lunes"],
          $item["martes"],
          $item["miercoles"],
          $item["jueves"],
          $item["viernes"],
          $item["sabado"],
          $item["domingo"]
          );

        array_push($listaTarifas, $tarifa);
      }
      */
      return $listaTarifas;      
    }

    public function updateTarifa(TarifaDia $tarifaDia){
      $stm = $this->db->prepare("update tarifa set $tarifaDia->dia = :nuevoPrecio where hora = :hora");
      $stm->bindParam(":nuevoPrecio",$tarifaDia->precio);
      $stm->bindParam(":hora", $tarifaDia->hora);
      $stm->execute();
    }

  }
?>