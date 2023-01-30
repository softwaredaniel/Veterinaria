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
  $update="UPDATE producto SET idproducto='$idproducto',Propedido='$Propedido',ProTipo='$ProTipo',ProStockMinimo='$ProStockMinimo',ProStockactual='$ProStockactual',Valor='$Valor'";
$result=mysql_query($con,$update);
if ($result){
    header('Location:administrador.php');
}
?>