<?php

 require_once('../backend/constant.php');
  require_once('../backend/functions.php');
  
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
   $Propedido = $_POST['Propedido'];
       $ProTipo  = $_POST['ProTipo'];
       $ProStockMinimo = $_POST['ProStockMinimo'];
      $ProStockactual = $_POST['ProStockactual'];
 $Valor = $_POST['Valor'];

 
$query    = "INSERT into producto (idproducto,Propedido,ProTipo,ProStockMinimo,ProStockactual,Valor)
                VALUES ('$idproducto','$Propedido',' $ProTipo', ' $ProStockMinimo', ' $ProStockactual ', '$Valor')";
$result   = mysqli_query($con,$query);
 
if($result){
	
header('Location: administrador.php');
}
 
  ?>

