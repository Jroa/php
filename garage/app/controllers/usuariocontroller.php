<?php
  require_once("model.php");
  require_once("view.php");
  require_once("models/usuario/usuariodao.php");
  require_once("models/usuario/usuario.php");
  require_once("viewlogin.php");
  require_once("models/usuario/gestorusuario.php");
  require_once("redirection.php");
  require_once("models/reserva/gestorreserva.php");

  class UsuarioController{

    private $usuarioDao;
    private $gestorUsuario;
    private $gestorReserva;
    private $redirection;

    public function __construct(){
      $this->usuarioDao = new UsuarioDao();
      $this->gestorUsuario = GestorUsuario::getInstance();
      $this->gestorReserva = GestorReserva::getInstance();
    }

    public function create(){

      $usuario = new Usuario();
      $usuario->email = $_POST["email"];
      $usuario->password = $_POST["password"];
      $usuario->nombre = $_POST["nombre"];
      $usuario->telefono = $_POST["telefono"];
      
      $this->usuarioDao->create($usuario);

      //setear session
      $usuario = $this->usuarioDao->getUsuariobyEmail($usuario->email);
      $this->gestorUsuario->setUsuarioReserva($usuario);

      Redirection::confirmarReserva();      
    }

    public function loginGet(){
        $view = new ViewLogin();
        $view->render(); 
    }

    public function loginPost(){
      //setar session
      //si antes era la pagina de seleccion de horas enviar a confirmacion
      //caso contrario permanecer en la pagina anterior

      $email = $_POST["emailLogin"];
      $password = $_POST["passwordLogin"];

      $usuarioRequest = new Usuario();
      $usuarioRequest->email = $email;
      $usuarioRequest->password = $password;

      $usuario = $this->usuarioDao->getUsuariobyEmail($email);

      $autenticacionOK = $this->gestorUsuario->validarUsuario($usuarioRequest, $usuario);

      if($autenticacionOK){
        //setear Usuario
        //si el array de items es mayor a 0 ir a confirmar reservá
        //else permanecer en la anterior pagina

        $this->gestorUsuario->setUsuarioReserva($usuario);

        if($usuario->esAdministrador()){
          Redirection::mantenimientoTarifa();
        }else{

          if($this->gestorReserva->cantidad() > 0 ){
            Redirection::confirmarReserva(); 
          }else{
            Redirection::paginaAnterior();
          }

        }

      }else{
        $view = new ViewLogin();
        $view->render();  
      }
    }

    public function logOut(){
      $this->gestorReserva->clearItems();
      $this->gestorUsuario->clearUsuarioReserva();
      Redirection::inicio();
    }

    public function getUsuariobyEmail(){
      $email = $_POST["email"];
      $usuario = $this->usuarioDao->getUsuariobyEmail($email);
      //$respuesta = (array)$usuario;
      //$respuesta["resultado"] = "ok";
      $existe = $usuario==null? "no":"si";

      header('Content-Type: application/json');
      echo json_encode(array('resultado' => 'ok', 'existe'=>$existe));
    }  
  }
?>