<?php
  require_once("model.php");
  require_once("view.php");
  require_once("models/tarifa/tarifa.php");
  require_once("models/tarifa/tarifadao.php");
  require_once("models/tarifa/tarifadia.php");

  class TarifaController{

    private $tarifaDao;

    public function __construct(){
      $this->tarifaDao = new TarifaDao();
    }

    public function index(){
      $listaTarifas = $this->tarifaDao->getTarifas();

      $model = new Model();
      $model->add("title","MANTENIMENTO DE TARIFAS");
      $model->add("listaTarifas", $listaTarifas);

      $view = new View("tarifa/index.php",$model);
      $view->render();
    }

    public function update(){
      
      $columnas = array("lun"=>"lunes",
        "mar" => "martes",
        "mie" => "miercoles",
        "jue" => "jueves",
        "mie" => "miercoles",
        "jue" => "jueves",
        "vie" => "viernes",
        "sab" => "sabado",
        "dom" => "domingo");

      
      foreach ($_POST as $key => $value){
        
        if (substr($key,0,2) == "id"){
          $hora = substr($key,3,2) . ":00"; 
          $keyDia  = strtolower (substr($key,7,3));
          $dia = $columnas[$keyDia];
          $tarifaDia = new TarifaDia($dia,$hora,$value);

          $this->tarifaDao->updateTarifa($tarifaDia);
        }
      }
      

      header('Content-Type: application/json');
      echo json_encode(array('resultado' => 'ok', 'mensaje' => 'Los datos se guardaron correctamente' ));
    }
  }

?>