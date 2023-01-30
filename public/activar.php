<?php
  session_start();
  //Incluimos las funciones principales
  //para que la aplicacion pueda correr
  require_once('../backend/constant.php');
  require_once('../backend/functions.php');
  //Entorno de Desarrollo
  if('ENVIROMENT' == 1){
      //Mostramos los Errores
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
  }else{
    //Errores Apagados
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
  }

  if(isLoggedIn()):
      //si no esta logeado, lo enviamos al login.
      $url = 'frontend.php';
      redirectToURL($url);
  else:
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title><?=TITLE;?></title>
    <!-- incluimos nuestros estilos -->
    <!-- incluimos nuestros estilos -->
  <link rel="stylesheet" type="text/css" href="custom.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/css/bootstrap/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../public/assets/js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/js/alertifyjs/css/alertify.css">


  </head>
  <body>

    <br><br><br>
    <div class="container">
      <div class="row">
    		<div class="col-sm-4"></div>
    		<div class="col-sm-4">
    			<div class="panel panel-danger">
    				<div class="panel panel-heading">Activar Usuario</div>
    				<div class="panel panel-body">
    					<form>
    						<label>Codigo de Activacion</label>
    					<input type="text" class="form-control input-sm" id="hash" name="hash">
    					<p></p>

              <input class="btn btn-primary" name="submit" type="submit" value="Submit">

    					</form>
    					<div style="text-align: right;">
    						<a href="index.php" class="btn btn-default">Login</a>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-sm-4"></div>
    	</div>

    </div>

    <!-- incluimos nuestros scripts -->
    <script src="../public/assets/js/jquery-3.2.1.min.js"></script>
    <script src="../public/assets/js/alertifyjs/alertify.js"></script>


    <script>
      $(function () {
        $('form').submit(function (event) {
          event.preventDefault();// using this page stop being refreshing
          $.ajax({
            type: 'POST',
            url: 'public/activaruser.php',
            data: $('form').serialize(),
            success: function () {
              alert('Activado Con Exito');
            }
          });

        });
      });
    </script>
  </body>
</html>
<?php
  endif;
?>
