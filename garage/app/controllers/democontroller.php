<?php
  require_once("model.php");
  require_once("view.php");
  require_once("models/demodao.php");

  class DemoController{

    public function index(){
      $model = new Model();
      $model->add("nombre","jonathan");
      $model->add("apellido","roa");

      $view = new View("demo/demoindex.php",$model);
      $view->render();      
    }

    public function index2(){
      $demoDao = new DemoDao();
      $listaPersonas = $demoDao->getPersonas();
      $model = new Model();
      $model->add("title","Listado de Personas");
      $model->add("listaPersonas",$listaPersonas);
      $view = new View('demo/demoindex2.php',$model);
      $view->render();
    }
  }
?>