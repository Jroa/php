<?php
  //session_start();
  if(!isset($_SESSION)) {
       session_start();
  }
  require_once("itemreserva.php");
  require_once("disponibilidad.php");
  require_once("reserva.php");
  require_once("models/sala/sala.php");
  require_once("models/sala/gestorsala.php");

  class GestorReserva{
    private static $instance;

    public static function getInstance(){
      if (self::$instance == null){
        self::$instance = new GestorReserva();
      }

      if(!isset($_SESSION["itemsReserva"])){
        $_SESSION["itemsReserva"] = array();
      }

      return self::$instance;      
    }

    private $listaSeleccionados;

    public function __construct(){
      $this->listaSeleccionados = array();
    }

    public function addItem(ItemReserva $itemReserva){
      $this->listaSeleccionados = $_SESSION["itemsReserva"];
      
      $item = array();
      $item["idSala"]= $itemReserva->idSala;
      $item["fecha"] = $itemReserva->fecha;
      $item["hora"]  = $itemReserva->hora;
      $item["precio"]= $itemReserva->precio;

      array_push($this->listaSeleccionados,$item);
      $_SESSION["itemsReserva"] = $this->listaSeleccionados;
    }

    public function deleteItem(ItemReserva $itemAEliminar){
      
      $listaAuxiliarReserva = array();
      $this->listaSeleccionados = $_SESSION["itemsReserva"];
      
      foreach($this->listaSeleccionados as $item){
        if(!$itemAEliminar->equals($item)){
          array_push($listaAuxiliarReserva, $item);
        }
      }

      $this->listaSeleccionados = $listaAuxiliarReserva;
      $_SESSION["itemsReserva"] = $this->listaSeleccionados;        
    }

    public function getItemsReserva(){
      $this->listaSeleccionados = $_SESSION["itemsReserva"];

      $gestorSala = GestorSala::getInstance();
      $sala = $gestorSala->getSala();

      $listaItems = array();
      foreach($this->listaSeleccionados as $item){
        if ($sala->idSala == $item["idSala"]){
          $itemReserva = new ItemReserva(
              $item["idSala"],
              $item["fecha"],
              $item["hora"],
              $item["precio"]
            );
          array_push($listaItems,$itemReserva);                
        }
      }

      return $listaItems;
    }

    public function getReservasSeleccionadas(Usuario $usuario){
      $this->listaSeleccionados = $_SESSION["itemsReserva"];

      $gestorSala = GestorSala::getInstance();
      $sala = $gestorSala->getSala();

      $listaReservas = array();
      foreach($this->listaSeleccionados as $item){
        if ($sala->idSala == $item["idSala"]){

          $reserva = new Reserva();
          $reserva->idReserva = null;
          $reserva->idSala = $item["idSala"];
          $reserva->idUsuario = $usuario->idUsuario;
          $reserva->fecha = $item["fecha"];
          $reserva->hora = $item["hora"];
          $reserva->precio = $item["precio"];

          array_push($listaReservas,$reserva);          
        }
      }

      return $listaReservas;
    }


    public function addSeleccionados($listaDisponibilidad,Sala $sala){
      $this->listaSeleccionados = $_SESSION["itemsReserva"];
      
      for($indice = 0; $indice < count($listaDisponibilidad); $indice++){
        $itemHora = $listaDisponibilidad[$indice];

        $itemHora = $this->setDiasSeleccionados($itemHora, $sala);     

        $listaDisponibilidad[$indice] = $itemHora;
      }
      
      return $listaDisponibilidad;
    }

    public function addReservados($listaDisponibilidad, $listaHorasReservadas){

      for($indice = 0; $indice < count($listaDisponibilidad); $indice++){
        $itemHora = $listaDisponibilidad[$indice];

        $itemHora = $this->setDiasReservados($itemHora, $listaHorasReservadas);     

        $listaDisponibilidad[$indice] = $itemHora;
      }
      
      return $listaDisponibilidad;      
    }

    private function setDiasReservados(Disponibilidad $item, $listaHorasReservadas){
      foreach($listaHorasReservadas as $reserva){
        if($item->hora == $reserva->hora){

          if( $item->fecha01 == $reserva->fecha){
            $item->estado01 = "R";
            $item->dia01 = $reserva->precio; 
          }
          if( $item->fecha02 == $reserva->fecha){
            $item->estado02 = "R"; 
            $item->dia02 = $reserva->precio;
          }
          if( $item->fecha03 == $reserva->fecha){
            $item->estado03 = "R";
            $item->dia03 = $reserva->precio;
          }
          if( $item->fecha04 == $reserva->fecha){
            $item->estado04 = "R"; 
            $item->dia04 = $reserva->precio;
          }
          if( $item->fecha05 == $reserva->fecha){
            $item->estado05 = "R";
            $item->dia05 = $reserva->precio;
          }
          if( $item->fecha06 == $reserva->fecha){
            $item->estado06 = "R"; 
            $item->dia06 = $reserva->precio;
          }
          if( $item->fecha07 == $reserva->fecha){
            $item->estado07 = "R"; 
            $item->dia07 = $reserva->precio;
          }
        }
      }

      return $item;      
    }


    private function setDiasSeleccionados(Disponibilidad $item, Sala $sala){
      //$this->listaSeleccionados = $_SESSION["itemsReserva"];

      foreach($this->listaSeleccionados as $seleccionado){
        if($item->hora == $seleccionado["hora"] &&
           $sala->idSala == $seleccionado["idSala"]){

          if( $item->fecha01 == $seleccionado["fecha"]){
            $item->estado01 = "S"; 
          }
          if( $item->fecha02 == $seleccionado["fecha"]){
            $item->estado02 = "S"; 
          }
          if( $item->fecha03 == $seleccionado["fecha"]){
            $item->estado03 = "S"; 
          }
          if( $item->fecha04 == $seleccionado["fecha"]){
            $item->estado04 = "S"; 
          }
          if( $item->fecha05 == $seleccionado["fecha"]){
            $item->estado05 = "S"; 
          }
          if( $item->fecha06 == $seleccionado["fecha"]){
            $item->estado06 = "S"; 
          }
          if( $item->fecha07 == $seleccionado["fecha"]){
            $item->estado07 = "S"; 
          }
        }
      }

      return $item;
    }


    public function clearItems(){
      $listaNueva = array();
      $this->listaSeleccionados = $listaNueva;
      $_SESSION["itemsReserva"] = $listaNueva;
    }

    public function cantidad(){
      if(isset($_SESSION["itemsReserva"])){

        $gestorSala = GestorSala::getInstance();
        $sala = $gestorSala->getSala();

        $this->listaSeleccionados = $_SESSION["itemsReserva"];
        $cantidad = 0;
        foreach($this->listaSeleccionados as $item){
          if ($item["idSala"]==$sala->idSala){
            $cantidad++;
          }
        }
        return $cantidad;
        //return count($this->listaSeleccionados);
      }else{
        return 0;
      }
    }

  }
?>