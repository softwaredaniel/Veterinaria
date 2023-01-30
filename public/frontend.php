<?php
  session_start();
  //Incluimos las funciones principales
  //para que la aplicacion pueda correr
  require_once('../backend/constant.php');
  require_once('../backend/functions.php');
  //contactar a la DB
  $con= DBConnect(HOST, DBUSER, DBPASS, DBNAME);
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

  //revisar si el usuario esta logeado
  if(!isLoggedIn()):
      //si no esta logeado, lo enviamos al login.
      $url = 'index.php';
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
  			<div class="col-sm-12">
  				<div class="jumbotron">
  				      <h1>Bienvenido <?=$_SESSION['usuario']?></h1>
  				</div>
  			</div>
  		</div>

      
      <div class="row">
  			<div class="col-sm-12">

            Eres Administrador, en el codigo deberia redirrecionar a la parte del Administrador
            o mostrar las parte del admin

          

                  <?php 
    //tabla de la base de datos 
    $table  = 'usuarios';
    //Obtenemos los Usuarios
    $usuarios = GetAllUsers($table, $con);
    
    //si no hay datos no mostramos nada
    if($usuarios == '')
    {
       echo '<h1>No Hay Dato Para Mostrar</h1>';
    }else{
      //Mostramos los datos
?>
<div>
  <div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Estado</th>
        <th>operacion</th>
      </tr>
        </thead>
        <tbody>
      <?php 
        //comenzamos a hacer el for
        foreach($usuarios as $us){
          //
          $rol    = GetUserRol($us['rol']);
          //
          $activo = CheckIfActive($us['active']);
      ?>
      <tr>
        <td><?=$us['id'];?></td>
        <td><?=$us['nombre'];?></td>
        <td><?=$us['apellido'];?></td>
        <td><?=$us['usuario'];?></td>
        <td><?=$rol;?></td>
        <td><?=$activo;?></td>
        <td> <a href="borrarusuarios.php?id=<?=$us['id'];?>">Eliminar</a> </td>
      </tr>
        </tbody>

      <?php 
        }//end foreach
      ?>
    </table>
  </div>
</div>
<?php 
} //final del if al mostrar datos
?>
            
             	</div>
  		</div>
   

      <div class="row">
       <div class="col-sm-12">
         <p>
           <a class="btn btn-danger" href="logout.php">Para cerrar sesion click Aca</a>
         </p>
       </div>
     </div>

    <!-- incluimos nuestros scripts -->
      <script src="../public/assets/js/jquery-3.2.1.min.js"></script>
    <script src="../public/assets/js/alertifyjs/alertify.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#usuarios').DataTable();
      });
    </script>
  </body>
</html>
<?php
  endif;
?>
