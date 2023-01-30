<?php 
  require_once('../backend/constant.php');
  require_once('../backend/functions.php');
  
  //revisamos si existe un id, si no hay, devolvemos a la pagina anterior
  $id = $_GET['id'];

  if(!$id){
      //
      echo 'Error, debes proveer un id';
      //terminamos el script.
      exit;
  }else{
    $host=   "localhost";
$database=  "proyectodeformacion";
$username= "root";
$password= "danielxd123"; 
    //
 
  $con = new mysqli($host, $username, $password, $database);
        
      
   

      
      //borramos el usuario
      DeleteUser($id, $con);
      //
      echo 'Usuario Borrado Exitosamente';
      header('Location:frontend.php');
  }
  
?>

