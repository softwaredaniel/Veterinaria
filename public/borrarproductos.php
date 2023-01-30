<?php

  require_once('../backend/constant.php');
  require_once('../backend/functions.php');
  ?>
<?php
     $host=   "localhost";
$database=  "proyectodeformacion";
$username= "root";
$password= "danielxd123"; 
    //
 
  $con = new mysqli($host, $username, $password, $database);
 if (!$con) {
	die('No se ha podido conectar a la base de datos');
}
$idproducto=$_POST['idproducto'];
$query="DELETE FROM producto WHERE  idproducto='$idproducto'";
$result= msql_query($con,$query);
if($result){
    header('Location:administrador.php');
}

