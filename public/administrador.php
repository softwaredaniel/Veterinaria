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
<html>
    <head>
         <link rel="stylesheet" type="text/css" href="../public/assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/css/bootstrap/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../public/assets/js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/js/alertifyjs/css/alertify.css">
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <div class="menu">
  
        <ul>
            <li><a href="logout.php">cerrar sesion</a></li>
            <li><a href="../index.html">volver ala pagina de inicio</a></li>
            <li><a href="historiaclinica.php">Historia clinica</a></li>
            <li><a href="reservas.php">reservas</a></li>
            <li><a href="frontend.php">administrar usuarios</a></li>
        </ul>
    </div>
    </head>
    <script>
        $(document).ready( function){
            $('.menu ul ul').css({postion:"absolute",display:"none"});
            $('.menu li').hover(function(){
                $(this).find('ul').stop(true,true).slideDown('slow');
            });
        }
        </script>
    
    <body>
        <div class="panel-body panel-default text-center">
        <form  class="form-inline form-horizontal" method="POST" action="insertarproductos.php">
            <h2>Ingreso de productos</h2>
            <br>
            <label>Codigo Producto</label><br>
            <input class="form-control" type="text" id="idprodcuto" name="idproducto" placeholder="codigo de producto" required><br>
            <label>Pedidos</label><br>
            <input class="form-control"type="text" id="Propedido" name="Propedido" placeholder="numero de pedido" required><br>
            <label>Tipo de Producto</label><br>
            <select class="form-control" name="ProTipo" id='ProTipo' required> <br>
                <option>Alimentos</option>
                <option>Medicamentos</option>
                <option>accesorios</option>
                <option>otros</option>
            </select><br>
          
             <label>Cantidad minima</label><br>
             <input class="form-control" type="text" id="ProStockMinimo" name="ProStockMinimo" placeholder="cantidad minima" required><br>
             <label>Cantidad Maxima</label><br>
             <input class="form-control" type="text" id="ProStockactual" name="ProStockactual" placeholder="cantidad maxima" required><br>
             <label>Valor</label><br>
             <input class="form-control" type="text" id="Valor" name="Valor" placeholder="valor por unidad" required><br>
            <button type="submit" class="btn-default">guardar</button>
        </form>
            </div>

       




        <table class="table-bordered table table-striped">
            <thead>
            <td>id</td>
            <td>Pedido</td>
            <td>TipoProdcuto</td>
            <td>C.minima</td>
            <td>C.Maxima</td>
            <td>Valor</td>
            <td>Eliminar</td>
          
            
            </thead><tbody>
                <?php
               $sql="SELECT *FROM producto";
               $result=mysqli_query($con,$sql);
               while($mostrar= mysqli_fetch_array($result)){
                   
               
                ?>
                <tr>
            <td><?php echo $mostrar['idproducto']?></td>
            <td><?php echo $mostrar['Propedido']?></td>
             <td><?php echo $mostrar['ProTipo']?></td>
            <td><?php echo $mostrar['ProStockMinimo']?></td>
            <td><?php echo $mostrar['ProStockactual']?></td>
            <td><?php echo $mostrar['Valor']?></td>
            <td><a href="borrarproductos.php">eliminar</a></td>
            
           
              
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
     
         


    </body>
    <footer class="panel-footer">
        <p align="center">Analisis y Desarrollo de Sistemas de informacion 2018</p>
    </footer>
</html>
  <?php endif; ?>




