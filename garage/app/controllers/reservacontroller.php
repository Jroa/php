<?php
  require_once("model.php");
  require_once("view.php");
  require_once("models/reserva/reservadao.php");
  require_once("models/reserva/gestorreserva.php");
  require_once("models/reserva/itemreserva.php");
  require_once("models/sala/saladao.php");
  require_once("models/sala/sala.php");
  require_once("models/usuario/gestorusuario.php");
  require_once("models/usuario/usuario.php");
  require_once("viewlogin.php");
  require_once("models/reserva/generadorimporte.php");
  require_once("models/reserva/reservaimporte.php");
  require_once("redirection.php");
  require_once("models/sala/gestorsala.php");

  class ReservaController{

    private $gestorReserva;
    private $gestorUsuario;
    private $gestorSala;

    public function __construct(){
      $this->gestorReserva = GestorReserva::getInstance();
      $this->gestorUsuario = GestorUsuario::getInstance();
      $this->gestorSala    = GestorSala::getInstance();
    }

    public function index(){
      Redirection::setUltimaPagina();
      
      $listaDisponibilidad = array();
      $reservaDao = new ReservaDao();
      $salaDao = new SalaDao();
      $fechaInicial = $this->getFechaInicial();
      $sala = $salaDao->getSala($_GET["idSala"]);

      $this->gestorSala->setSala($sala);

      $semana     = $reservaDao->getSemanaReserva($fechaInicial);
      $listaDisponibilidad = $reservaDao->getHorarioReserva($fechaInicial);
      $listaHorasReservadas = $reservaDao->getHorasReservadas($sala->idSala, $fechaInicial);

      $listaDisponibilidad = 
      $this->gestorReserva->addReservados($listaDisponibilidad,$listaHorasReservadas);
      
      $listaDisponibilidad = 
      $this->gestorReserva->addSeleccionados($listaDisponibilidad, $sala);

      $model = new Model();
      $model->add("title","RESERVA DE ESPACIOS");
      $model->add("semana",$semana);
      $model->add("sala",$sala);
      $model->add("listaDisponibilidad",$listaDisponibilidad);
      $view = new View("reserva/index.php",$model);
      $view->render();
    }

    public function addItem(){
      $fecha = $_POST["fecha"];
      $hora = $_POST["hora"];
      $precio = $_POST["precio"];

      $sala = $this->gestorSala->getSala();

      $nuevoItem = new ItemReserva($sala->idSala, $fecha, $hora, $precio);
      $this->gestorReserva->addItem($nuevoItem);

      header('Content-Type: application/json');
      echo json_encode(array('resultado' => 'ok' . $this->gestorReserva->cantidad()));      
    }

    
    public function deleteItem(){
      $fecha = $_POST["fecha"];
      $hora = $_POST["hora"];

      $sala = $this->gestorSala->getSala();

      $itemABorrar = new ItemReserva($sala->idSala, $fecha, $hora, "0");
      $this->gestorReserva->deleteItem($itemABorrar);

      header('Content-Type: application/json');
      echo json_encode(array('resultado' => $fecha . $hora));                
    }
    

    private function getFechaInicial(){
      date_default_timezone_set('America/Lima');
      $date=new DateTime();
      $result = $date->format('Y-m-d');
      return $result;      
    }

    private function getFechaPedido(){
      date_default_timezone_set('America/Lima');
      $date=new DateTime();
      $result = $date->format('d/m/Y');
      return $result;        
    }

    public function getTotalItems(){
      $cantidad = $this->gestorReserva->cantidad();

      header('Content-Type: application/json');
      echo json_encode(array('resultado' => "ok", 'cantidad' => $cantidad));       
    }

    public function confirmarCompra(){

      if ($this->gestorUsuario->estaLogeadoElUsuario()){
        Redirection::confirmarReserva(); 
      }else{
        $view = new ViewLogin();
        $view->render();
      }
    }

    public function confirmar(){
      $model = new Model();
      $fechaPedido = $this->getFechaPedido();
      $itemReservados = $this->gestorReserva->getItemsReserva();
      $generadorImporte = new GeneradorImporte($itemReservados);
      $reservaImporte = $generadorImporte->getReservaImporte();
      $usuario = $this->gestorUsuario->getUsuarioReserva();
      $sala = $this->gestorSala->getSala();
      $model->add("title","CONFIRMACION");
      $model->add("fechaPedido",$fechaPedido);
      $model->add("itemReservados",$itemReservados);
      $model->add("reservaImporte",$reservaImporte);
      $model->add("usuario",$usuario);
      $model->add("sala",$sala);
      $view = new View("reserva/confirmar.php",$model);      
      $view->render();
    }

    public function create(){
      $reservaDao = new ReservaDao();
      $usuario = $this->gestorUsuario->getUsuarioReserva();

      $listaReservas = $this->gestorReserva->getReservasSeleccionadas($usuario);
      $reservaDao->createReservas($listaReservas);

      $this->gestorReserva->clearItems();
      $this->gestorSala->clearSala();

      $model = new Model();
      $model->add("title","RESERVA GUARDADA");
      $model->add("mensaje","Se realizo la reserva");
      $view = new View("reserva/create.php", $model);
      $view->render();
    }

    public function consultaReservas(){
      $usuario = $this->gestorUsuario->getUsuarioReserva();

      $reservaDao = new ReservaDao();
      $listaReservas = $reservaDao->getReservasDelUsuario($usuario);

      $model = new Model();
      $model->add("title","CONSULTA DE RESERVAS");
      $model->add("listaReservas",$listaReservas);
      $view = new View("reserva/consultausuario.php", $model);
      $view->render();      
    }
  }
?>