<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>

<br>
<br>

<h3>Agregar Producto</h3> 





<div class="col-xs-15 col-md-6">
    <div class="d-flex justify-content-center  " role="alert">
 
      <form action = "guardarProducto.php" method="POST" enctype="multipart/form-data">

  <div class="form-group row">
    
    <div class="col-sm-10">
       <input type="text" class="form-control" name="nombre" placeholder="nombre">
    </div>
  </div>
  <div class="form-group row">
    
    <div class="col-sm-10">
      <input type="text" class="form-control" name="precio" placeholder="precio">
    </div>
  </div>
  <div class="form-group row">
    
    <div class="col-sm-10">
      <input type="text" class="form-control" name="descripcion" placeholder="descripcion">
    </div>
  </div>
  

  
      <input type="file" required name ="imagen"/><br>
    
  
  <br>
<button type="file" class="btn btn-primary">Aceptar</button>
</div>
</div>



   </form>








<?php
include 'templates/pie.php';
?>