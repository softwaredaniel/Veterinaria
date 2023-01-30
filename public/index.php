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
      $url = 'administrador.php';
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
    			<div class="panel panel-primary">
    				<div class="panel panel-heading">Login <?=TITLE;?></div>
    				<div class="panel panel-body">
    					<div style="text-align: center;">
    						<img src="../images/logoveterinaria.png" height="200">
    					</div>
    					<p></p>
              <form action="login.php" method="POST">
    					<label>Usuario</label>
    					<input type="text" id="usuario" class="form-control input-sm" name="usuario">
    					<label>Password</label>
    					<input type="password" id="password" class="form-control input-sm" name="password">
    					<p></p>

              <input class="btn btn-primary" id="entrarSistema"  type="Submit" value="Entrar" >
    					<a href="registrar.php" class="btn btn-danger">Registro</a>

              <a href="activar.php" class="btn btn-primary">Activar Usuario</a>
              </form>
    				</div>
    			</div>
    		</div>
    		<div class="col-sm-4"></div>
    	</div>
    </div>

    <!-- incluimos nuestros scripts -->
       <script src="../public/assets/js/jquery-3.2.1.min.js"></script>
    <script src="../public/assets/js/alertifyjs/alertify.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#entrarSistema').click(function(){
    			if($('#usuario').val()==""){
    				alertify.alert("Debes agregar el usuario");
    				return false;
    			}else if($('#password').val()==""){
    				alertify.alert("Debes agregar el password");
    				return false;
    			}
    		});
    	});
    </script>
  </body>
</html>
<?php
  endif;
?>
