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

    <title>Registro de usuarios</title>
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
    				<div class="panel panel-heading">Registro de usuario</div>
    				<div class="panel panel-body">
    					<form id="frmRegistro">
    						<label>Nombre</label>
    					<input type="text" class="form-control input-sm" id="nombre" name="">
    					<label>Apellido</label>
    					<input type="text" class="form-control input-sm" id="apellido" name="">
    					<label>Usuario</label>
    					<input type="text" class="form-control input-sm" id="usuario" name="">
    					<label>Password</label>
    					<input type="text" class="form-control input-sm" id="password" name="">
    					<p></p>
    					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
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
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#registrarNuevo').click(function(){

    			if($('#nombre').val()==""){
    				alertify.alert("Debes agregar el nombre");
    				return false;
    			}else if($('#apellido').val()==""){
    				alertify.alert("Debes agregar el apellido");
    				return false;
    			}else if($('#usuario').val()==""){
    				alertify.alert("Debes agregar el usuario");
    				return false;
    			}else if($('#password').val()==""){
    				alertify.alert("Debes agregar el password");
    				return false;
    			}

    			cadena="nombre=" + $('#nombre').val() +
    					"&apellido=" + $('#apellido').val() +
    					"&usuario=" + $('#usuario').val() +
    					"&password=" + $('#password').val();

    					$.ajax({
    						type:"POST",
    						url:"public/registro.php",
    						data:cadena,
    						success:function(r){

    							if(r==2){
    								alertify.alert("Este usuario ya existe, prueba con otro :)");
    							}
    							else if(r==1){
    								$('#frmRegistro')[0].reset();
    								alertify.success("Agregado con exito");
    							}else{
    								alertify.error("Fallo al agregar");
    							}
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
