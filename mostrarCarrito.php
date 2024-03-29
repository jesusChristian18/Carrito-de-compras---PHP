<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

<br>

<h3>Lista del carrito </h3>

<?php if(!empty($_SESSION['carrito']))  { ?>
<table class="table table-light">
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%" >--</th>
        </tr>
<?php $total=0; ?>
<?php foreach ($_SESSION['carrito'] as $indice => $producto) {?>

<tr>
    <td width="40%"><?php echo $producto['nombre']?></td>
    <td width="15%" class="text-center"><?php echo $producto['cantidad']?></td>
    <td width="20%" class="text-center">S/<?php echo $producto['precio']?></td>
    <td width="20%" class="text-center">S/<?php echo number_format($producto['precio']*$producto['cantidad'],2);?></td>
    <td width="5%">
     

    <form action="" method="post">

    <input type="hidden" 
    name="id"
    value="<?php echo $producto['id']; ?>">

        <button type="submit"
         class="btn btn-danger"
         name="btnAccion"
         value="Eliminar"
         >Eliminar</button>

    </form>
    </td>

</tr>

<?php $total=$total+($producto['precio']*$producto['cantidad']); ?>
<?php } ?>
<tr>
    <td colspan="3" align="right"><h3>Total</h3></td>
    <td align="right"><h3>S/<?php echo number_format($total,2); ?></h3></td>
    <td></td>

</tr>

<tr>
    
    <td colspan="5">
        <form action="pagar.php" method="post">
            <div class="alert alert-success" role="alert">
                <div class="form-group">
                    <label for="my-input">Correo de Contacto</label>
                    <input id="email"
                    class="form-control" 
                    type="email"
                    name="email"
                    placeholder="Por favor ingrese su correo"
                    required>
                </div>
                <small id="emailHelp"
                    class="form-text text-muted">
                    Los productos se enviaran a este correo
                </small>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit"
            name="btnAccion"
            value="proceder">
                Proceder a pagar</button>
        </form>

       
    </td>
</tr>




    </tbody>
</table>


    
<?php } else {?>
 <div class="alert alert-success" role="alert">
     no hay productos
 </div>


<?php } ?>
<?php
include 'templates/pie.php';
?>