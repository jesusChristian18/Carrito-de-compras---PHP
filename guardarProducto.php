<?php

	

	$nombre= $_POST['nombre'];

	$precio= $_POST['precio'];

	$descripcion= $_POST['descripcion'];

	
//esta linea es para guardar la imagen en bits a la base de datos
	$imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

	$query = "INSERT INTO panda(nombre,precio,descripcion,imagen) values ('$nombre', '$precio', '$descripcion','$imagen')";
	
	//$resultado = $conexion->query($query);
	//$resultado = mysql_query($sql,$con);

	if($query){
		header("Location: index.php");
	}
	else{
		echo "no se inserto";
	}


?>