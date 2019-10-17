<?php

	

	$nombre= $_POST['nombre'];

	$numeroTarjeta= $_POST['numeroTarjeta'];

	$fechaVencimiento= $_POST['fechaVencimiento'];

	
//esta linea es para guardar la imagen en bits a la base de datos
	

	$query = "INSERT INTO tarjeta(nombre,numeroTarjeta,fechaVencimiento) values ('$nombre', '$numeroTarjeta', '$fechaVencimiento')";
	
	$resultado = $conexion->query($query);
	//$resultado = mysql_query($sql,$con);

	if($resultado){
		//header("Location: index.php");
		echo "se inserto";
	}
	
	else{
		echo "no se inserto";
	}


?>