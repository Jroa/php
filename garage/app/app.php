<?php
  //require_once("controllers/democontroller.php");


  $controller_request    = $_REQUEST["controller"];
  $action                = $_REQUEST["action"];

  require_once("controllers/" . $controller_request . "controller.php");

  $controllerName = ucfirst($controller_request) . "Controller";
  $controller = new $controllerName;

  call_user_func(array($controller,$action));
?>