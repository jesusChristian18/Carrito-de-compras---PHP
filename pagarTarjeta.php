<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<?php if($_POST){
    $total=0;
    $sid=session_id();
    $correo=$_POST['email'];
    foreach($_SESSION['carrito'] as $indice=>$producto){
        
        $total=$total+($producto['precio']*$producto['cantidad']);
    }

    $sentencia=$PDO->prepare("INSERT INTO `ventas` 
            (`id`, `claveTransaccion`, `paypalDatos`, `fecha`, `correo`, `total`, `status`) 
        VALUES (NULL, :claveTransaccion, '', NOW(), :correo, :total, 'pendiente');");
    $sentencia->bindParam(":claveTransaccion",$sid);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":total",$total);
    $sentencia->execute();
    $idVenta=$PDO->lastInsertid();

    foreach($_SESSION['carrito'] as $indice=>$producto){
        $sentencia=$PDO->prepare ("INSERT INTO `detalleventa` (`id`, `idVenta`, `idProducto`, `precioUnitario`, `cantidad`, `descargado`) 
                VALUES (NULL, :idVenta, :idProducto, :precioUnitario, :cantidad, '0');");

                $sentencia->bindParam(":idVenta",$idVenta);
                $sentencia->bindParam(":idProducto",$producto['id']);
                $sentencia->bindParam(":precioUnitario",$producto['precio']);
                $sentencia->bindParam(":cantidad",$producto['cantidad']);
                $sentencia->execute();
    }
    //echo"<h3>" .$total. "</h3>";
}
 ?>
<div class="container">
  <div class="row">
  <div class="col-md-6 offset-md-3">
<div class="creditCardForm">
    <div class="heading">
        <h1>Confirmar Pago</h1>
    </div>
    <div class="payment">
        <form action = "guardarPago.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
    
    <div class="col-sm-10">
      <input type="text" class="form-control" required name="nombre" placeholder="nombre">
    </div>
        </div>
        <div class="form-group row">
    
    <div class="col-sm-10">
      <input type="text" class="form-control" required name="numeroTarjeta" placeholder="numeroTarjeta">
    </div>
        </div>
    <div class="form-group row">
    
    <div class="col-sm-10">
      <input type="text" class="form-control" required name="fechaVencimiento" placeholder="fechaVencimiento">
    </div>
    </div>
    
    <br> 
    <button onclick="location.href='final.php'" type="button" class="btn btn-primary">Aceptar</button>
        </form>
    </div>
</div>
  </div>
  </div>
</div>





<?php
include 'templates/pie.php';
?>