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

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <p class="lead">Estas a punto de pagar con visa la cantidad de: 
        <h4>S/<?php echo number_format($total,2); ?></h4>
        
    </p>
    <hr class="my-4">
    <p>Los productos podran ser descargados una vez que se procese el pago<br/>
        <strong>(para aclaraciones: chris.jesus1997@gmail.com)</strong>
    </p>
    <button onclick="location.href='pagarTarjeta.php'" type="button" class="btn btn-primary">Proceder a pagar</button>
</div>






<?php
include 'templates/pie.php';
?>