<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../public/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../public/css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../public/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../public/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="frmLogin" action="app.php" method="post">
              <input type="hidden" name="controller" value="usuario">
              <input type="hidden" name="action" value="loginPost">            
              <h1>Logearse</h1>
              <div>
                <input type="text" id="emailLogin" name="emailLogin" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" id="passwordLogin" name="passwordLogin" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" onclick="login()">Logearse</a>
                <a class="reset_pass" href="#">Perdiste tu password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Eres nuevo?
                  <a href="#signup" class="to_register"> Crear cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="frmCrear" action="app.php" method="post">
              <input type="hidden" name="controller" value="usuario">
              <input type="hidden" name="action" value="create">
              <h1>Crear Cuenta</h1>
              <div>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre y Apellidos" required="" />
              </div>
              <div>
                <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" required="" />
              </div>              
              <div>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" id="confirmarPassword" name="confirmarPassword"class="form-control" placeholder="Confirmar Password" required="" />
              </div>              
              <div>
                <a class="btn btn-default submit" onclick="crearCuenta()">Crear Cuenta</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya eres usuario registrado ?
                  <a href="#signin" class="to_register"> Logearse</a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../public/js/jquery.min.js"></script>
   
    <script>
      function crearCuenta(){

        if (validacionOk()){

          var email  = $("#email").val();
          if (emailExiste(email)){
            alert("Ya existe un usuario con ese email");
          }else{
            enviarDatosCreacion();
          }
          
        }
      
      }
      function enviarDatosCreacion(){
        document.getElementById("frmCrear").submit();
      }
      function validacionOk(){
        var nombre = $("#nombre").val();
        var email  = $("#email").val();
        var password = $("#password").val();
        var confirmarPassword = $("#confirmarPassword").val()

        if(nombre.length <= 0){
          alert("Debe ingresar el nombre")
          return false;
        }

        if(email.length <= 0){
          alert("Debe ingresar el email")
          return false;
        }

        if(password.length <= 0){
          alert("Debe ingresar el password")
          return false;
        }

        if(confirmarPassword.length <= 0){
          alert("Debe ingresar la confirmacion de password")
          return false;
        }        

        if( password != confirmarPassword){
          alert("Los password deben ser iguales")
          return false;
        }

        return true;
      }

      function emailExiste(pEmail){

        var existe=false;
        $.ajax({
          url : "app.php",
          async: false,
          data: { controller: "usuario", action: "getUsuariobyEmail", email: pEmail},
          type: "POST",
          dataType: "json",
          success: function(json){
            //alert(json.resultado + " " + json.cantidad);
            if (json.resultado == "ok"){
              //alert(json.existe);
              if (json.existe=="si"){
                existe = true;
              }
            }
          }
        });
        return existe;   
      }

      function login(){
        if (validacionDatosLoginOk()){
          enviarDatosLogin();
        }
      }

      function validacionDatosLoginOk(){
        var email  = $("#emailLogin").val();
        var password = $("#passwordLogin").val();

        if(email.length <= 0){
          alert("Debe ingresar el email")
          return false;
        }

        if(password.length <= 0){
          alert("Debe ingresar el password")
          return false;
        }

        return true;        
      }

      function enviarDatosLogin(){
        document.getElementById("frmLogin").submit();
      }
    </script>
  </body>
</html>