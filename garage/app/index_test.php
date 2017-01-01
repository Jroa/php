<a href="app.php?controller=sala&action=index">Ir Sala</a>
<br/>
<a href="app.php?controller=reserva&action=index">Ir Reserva</a>
<br/>
<a href="app.php?controller=tarifa&action=index">Ir Tarifa</a>
<br/>
<a href="app.php?controller=usuario&action=createGet">Crear Usuario</a>
<br/>
<a href="app.php?controller=reserva&action=confirmar">Ir a Confirmacion</a>
<?php
  
  /*
  require_once("models/reserva/reservadao.php");

  $reservaDao = new ReservaDao();
  $semana = $reservaDao->getSemanaReserva();
  //print_r($semana);
  */
  /*
  $date=new DateTime();
  $result = $date->format('Y-m-d');
  echo $result;
  */

  /*
  require_once("models/reserva/itemreserva.php");
  require_once("models/reserva/gestorreserva.php");

  $item = new ItemReserva("2016-06-26","14:00","25");
  $item2 = new ItemReserva("2016-06-26","15:00","25");
  $item3 = new ItemReserva("2016-06-26","16:00","25");

  $gestor = new GestorReserva();
  $gestor->addItem($item);
  $gestor->addItem($item2);
  $gestor->addItem($item3);

  print_r($gestor);

  $gestor->deleteItem($item2);
  echo "<br/>";
  echo "<br/>";
  print_r($gestor);

  $gestor->deleteItem($item3);
  echo "<br/>";
  echo "<br/>";
  print_r($gestor);

  $gestor->deleteItem($item3);
  echo "<br/>";
  echo "<br/>";
  print_r($gestor);

  $gestor->deleteItem($item);
  echo "<br/>";
  echo "<br/>";
  print_r($gestor);  
  
  echo "<br/>";
  echo "<br/>";
  print_r($_SESSION["gestorReserva"]);

  */
  //print_r($_SESSION);
  /*
  session_start();
  session_unset();
  session_destroy();
  */
  session_start();
  //require("models/reserva/gestorreserva.php");
  //print_r(GestorReserva::getInstance());
  print_r($_SESSION);

/*
  if(!isset($_SESSION["itemsReserva"])){
    echo "nulo";
  }
*/

  //require("views/structure/helper.php");

  //echo Helper::getEstilo("S");
      /*
      $date=new DateTime();
      $result = $date->format('Y-m-d');
      echo $result;  
      */
  /*
  require("models/usuario/usuario.php");

  $usuario = new Usuario();
  $usuario->nombre = "jonathan";
  $usuario->password="123456";
  $parametros = (array)$usuario;

  print_r($parametros);
  */

  /*
  require("models/usuario/usuario.php");
  require("models/usuario/usuariodao.php");

  $dao = new UsuarioDao();
  $usuario = $dao->getUsuarioByEmail("1234");
  print_r($usuario);

  if($usuario == null){
    echo "es nulo";
  }
  */

?>


