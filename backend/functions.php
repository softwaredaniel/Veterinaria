<?php
//funcion para conectar a la base de Datos
function DBConnect($host,$username, $password, $database){
    //
    $conexion = new mysqli($host, $username, $password, $database);
    //
    if($conexion->connect_error){
      die("Erro al conectar a la Base de Datos: ".$conexion->connect_error);
    }
    return $conexion;
}

//Revisar si Existe el usuario
function IsRegister($val, $con){
    //
    $usuario  = $val['username'];
    $password = sha1($val['password']);
    $level   = 1;
    //
    $query  = "SELECT * FROM usuarios WHERE usuario='$usuario'AND
                    password='$password' AND level='$level'";
    //
    $result = mysqli_query($con, $query);
    //
    if(mysqli_num_rows($result) >= 1){
        //Usuario Existe
        return true;
    }else{
        //Usuario no Existe
        return false;
    }
}

//Registro de usuarios
function RegisterUser($val, $con){
  //
  $usuario  = $val['username'];
  $password = sha1($val['password']);
  $nombre   = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $active   = 0;
  $level    = 1;
  $date     = date('h:i:s');
  $hash     = md5(sha1($date));
  //
  $query    = "INSERT into usuarios (nombre,apellido,usuario,password,active,level,hash)
                VALUES ('$nombre','$apellido', '$usuario', '$password', '$active', '1', '$hash')";
  //
  $result   = mysqli_query($con,$query);
  //
  return $result;

}

//Mostrar Todos los Usuarios {conexion}
function GetAllUsers($table,$con){
    //
    $query    = "SELECT * from $table";
    $result   = mysqli_query($con,$query);
    //
    if(mysqli_num_rows($result) >= 1){
        //hay datos
        return $result;
    }else{
        //no hay datos
        return false;
    }

}

//Borrar Usuario {connexion} {id}
function DeleteUser($val, $con){
    //Crear la funcion para borrar un usuario usando un id
    

      //Crear la funcion para borrar un usuario usando un id
      $id = $val;
   
      $query="DELETE FROM usuarios WHERE id='$id'";
      $result = mysqli_query($con,$query); 

      if($result){
            // Si todo esta bien enviamos el mensaje de que se borro
            $msg = 'ok';
            return $msg;
      }else{
          // Enviamos el Mensaje de Error
          $msg = 'ha fallado en la eliminacion del registro';
          return $msg;
      }
}
    



//Editar usuario {connexion} {id}
function EditUsers($val, $con){
    //Crear la funcion para editar usuario usando un id

}

//Confirmar Usuario
function ConfirmUser($val, $con){
    //
    $hash = $val;
    //
    $query    = "SELECT * from usuarios WHERE hash='$hash'";
    $result   = mysqli_query($con,$query);
    //
    if(mysqli_num_rows($result) == 1){
        //Has Valido
        $update   = "UPDATE usuarios SET active='1', hash='' WHERE hash='$hash'";
        $rupdate  = mysqli_query($con,$update);
        return true;
    }else{
        //Usuario no Existe
        return false;
    }
}

//Entrar al Sistema
function LoginUser($val, $con){
    //
    if(!isset($_SESSION)){
        session_start();
    }
    //
    $usuario  = $val['username'];
    $password = sha1($val['password']);
    $active   = 1;

    //
    $query  = "SELECT * FROM usuarios WHERE usuario='$usuario' AND
                    password='$password' AND active='$active'";
    $result = mysqli_query($con, $query);
    //
    if(mysqli_num_rows($result) >= 1){
        //Usuario Existe
        while($object = $result->fetch_object()){
            //
            $level = $object->level;
            if($level == 999){
                //Administrador
                $_SESSION['is_admin']=TRUE;
                $_SESSION['logged_in']=TRUE;
                $_SESSION['usuario']=$object->usuario;
                $_SESSION['level']=$level;
                $_SESSION['id']=$object->id;
            }else{
                //Usuario
                $_SESSION['logged_in']=TRUE;
                $_SESSION['usuario']=$object->usuario;
                $_SESSION['level']=$level;
                $_SESSION['id']=$object->id;
            }

        }
        return true;
    }else{
        //Usuario no Existe
        return false;
    }

}

//revisar si es administrador
function isAdmin(){
  //
  if(!isset($_SESSION)){
      session_start();
  }
  //
  if(empty($_SESSION['is_admin'])){
      return false;
  }
  return true;
}

//revisar si esta logeado
function isLoggedIn(){
    //
    if(!isset($_SESSION)){
        session_start();
    }
    //
    if(empty($_SESSION['logged_in'])){
        return false;
    }
    return true;

}
//redireccionar a una url
function redirectToURL($url){
    header("Location: $url");
    exit;
}

//Cerrar la sesion
function LogOut(){
    //
    session_start();
    //
    session_destroy();
    //
    if(empty($_SESSION)){
        return true;
    }
}
function GetUserRol($rol)
{
    //revismos si es adminsitrador
    if($rol == 999)
    {
        //
        $msg ='Administrador';
        
        return $msg;
    }else{
        //
        $msg = 'Usuario';
        
        return $msg;
    }
}
function CheckIfActive($active)
{
    //
    if($active == 1)
    {
        //
        $msg = 'Activo';
        //
        return $msg;
    }else{
        //
        $msg = 'Inactivo';
        //
        return $msg;
    }
}
