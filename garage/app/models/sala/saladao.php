<?php
  require_once("models/db/db.php");
  require_once("sala.php");
  class SalaDao{
    private $db;

    public function __construct(){
      $this->db = Db::getInstance();
    }

    public function getSalas(){
      $listaSalas = array();
      $stm = $this->db->query("select * from sala");
      $stm->setFetchMode(PDO::FETCH_CLASS, "Sala");
      $stm->execute();
      $result = $stm->fetchAll();
      foreach ($result as $sala){
        array_push($listaSalas, $sala);
      }
      return $listaSalas;    
    }

    public function getSala($idSala){
      $sql = "select * from sala where idSala = :id";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(":id",$idSala, PDO::PARAM_INT);
      $stm->execute();
      $stm->setFetchMode(PDO::FETCH_CLASS, "Sala");
      $sala = $stm->fetch();
      return $sala;      
    }
  }
?>