<?php
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
  //Borramos las sessiones activas
 LogOut();
 //reenviamos al login
 $url = "index.php";
 redirectToURL($url);

?>
