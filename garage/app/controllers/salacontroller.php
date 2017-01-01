<?php
  require_once("model.php");
  require_once("view.php");
  require_once("models/sala/saladao.php");
  require_once("models/sala/sala.php");
  require_once("redirection.php");

  class SalaController{

    private $salaDao;

    public function __construct(){
      $this->salaDao = new SalaDao();
    }

    public function index(){
      Redirection::setUltimaPagina();
      $listaSalas = $this->salaDao->getSalas();

      $model = new Model();
      $model->add("title","SALAS DE ENSAYO");
      $model->add("listaSalas",$listaSalas);
      $view = new View("sala/index.php",$model);
      $view->render();     
    }
  }  

?>