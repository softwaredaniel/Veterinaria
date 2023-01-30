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

if($_POST){
  //
  $data = array(
                'username' => $_POST['usuario'],
                'password' => $_POST['password']
              );
  //
  $checkUser = LoginUser($data, $con);
  //
  if($checkUser){
      //redireccion a la zona de usuarios.
      $url = "administrador.php";
      redirectToURL($url);

  }else{
      echo 0;
  }
}

?>
