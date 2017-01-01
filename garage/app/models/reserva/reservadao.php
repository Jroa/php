<?php
  require_once("models/db/db.php");
  require_once("semanareserva.php");
  require_once("disponibilidad.php");
  require_once("reserva.php");
  require_once("reservausuario.php");

  class ReservaDao{
    //private $horario;
    private $db;

    public function __construct(){
      //$this->horario = array();
      $this->db = Db::getInstance();
    }

    public function getSemanaReserva($fechaInicial){
      //fecha Inicial = yyyy-mm-dd
      $sql = "call usp_semanareserva(:fechaInicial)";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(":fechaInicial",$fechaInicial, PDO::PARAM_STR,100);
      $stm->execute();
      $stm->setFetchMode(PDO::FETCH_CLASS, "SemanaReserva");
      $semanaReserva = $stm->fetch();
      return $semanaReserva;
    }

    public function getHorarioReserva($fechaInicial){
      //fecha Actual = yyyy-mm-dd
      $listaDisponibilidad = array();
      $sql = "call usp_disponibilidad(:fechaInicial)";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(':fechaInicial',$fechaInicial, PDO::PARAM_STR, 100);
      $stm->execute();
      $stm->setFetchMode(PDO::FETCH_CLASS,"Disponibilidad");
      $result = $stm->fetchAll();
      foreach($result as $disponibilidad){
        array_push($listaDisponibilidad, $disponibilidad);
      }
      return $listaDisponibilidad;

    }

    public function getHorasReservadas($idSala,$fechaInicial){
      $listaHorasReservadas = array();
      $sql = "call usp_horasreservadas(:idSala, :fechaInicial)";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(':idSala',$idSala, PDO::PARAM_INT);
      $stm->bindParam(':fechaInicial',$fechaInicial, PDO::PARAM_STR, 100);
      $stm->execute();
      $stm->setFetchMode(PDO::FETCH_CLASS,"Reserva");
      $result = $stm->fetchAll();
      foreach($result as $reserva){
        array_push($listaHorasReservadas, $reserva);
      }
      return $listaHorasReservadas;
    }

    public function createReservas(array $listaReservas){
      $sql = "insert into reserva(idReserva,idSala,idUsuario, fecha, hora, precio)
      values(:idReserva, :idSala, :idUsuario,str_to_date(:fecha, '%Y-%m-%d'),:hora,:precio)";      
      foreach($listaReservas as $reserva){
        $reserva->idReserva = null;
        $stm = $this->db->prepare($sql);
        $parameters = (array)$reserva;
        $stm->execute($parameters);  
      }
    }

    public function getReservasDelUsuario(Usuario $usuario){
      $listaReservas = array();
      $sql = "call usp_reservasdeusuario(:idUsuario)";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(':idUsuario',$usuario->idUsuario, PDO::PARAM_INT);
      $stm->execute();
      $stm->setFetchMode(PDO::FETCH_CLASS,"ReservaUsuario");
      $result = $stm->fetchAll();
      foreach($result as $reserva){
        array_push($listaReservas, $reserva);
      }
      return $listaReservas;      
    }
  }
?>