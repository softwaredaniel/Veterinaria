<?php
  //Incluimos las funciones principales
  //para que la aplicacion pueda correr
  require_once('../backend/constant.php');
  require_once(BACKENDPATH.'functions.php');
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
                'username'  => $_POST['usuario'],
                'password'  => $_POST['password'],
                'nombre'    => $_POST['nombre'],
                'apellido'  => $_POST['apellido']
              );
  //
  $checkUser = IsRegister($data, $con);
  //
  if($checkUser){
    echo 2;
  }else{
    $registerUser = RegisterUser($data, $con);
    echo 1;
  }
}

?>
