<?php
session_start();
$mensaje="";

if(isset($_POST['btnAccion'])){
    switch ($_POST['btnAccion']) {
        case 'Agregar':
           if(is_numeric( $_POST['id'])){
                $id=$_POST['id'];
                $mensaje.="OK id correcto ".$id;
           }else{
               $mensaje.="id incorrecto...".$id;
           }

                if(is_string($_POST['nombre'])){
                $nombre=$_POST['nombre'];
                $mensaje.="OK Nombre ".$nombre;
                }else{
                $mensaje.="id incorrecto...".$nombre;
                }

                    if(is_numeric( $_POST['cantidad'])){
                    $cantidad=$_POST['cantidad'];
                    $mensaje.="OK Cantidad  ".$cantidad;
                    }else{
                    $mensaje.="id incorrecto...".$cantidad;
                    }

                        if(is_numeric( $_POST['precio'])){
                        $precio=$_POST['precio'];
                        $mensaje.="OK Precio ".$precio;
                        }else{
                        $mensaje.="id incorrecto...".$precio;
                        }

            if(!isset($_SESSION['carrito'])){
                $producto=array(
                    'id'=>$id,
                    'nombre'=>$nombre,
                    'cantidad'=>$cantidad,
                    'precio'=>$precio,
                );
                $_SESSION['carrito'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{
                $idProductos=array_column($_SESSION['carrito'],"id");
            if(in_array($id,$idProductos)){
                echo "<script>alert('El producto ya ha sido seleccionado'); </script>";
                $mensaje="";
            }else{     

                $NumeroProductos=count($_SESSION['carrito']);
                $producto=array(
                    'id'=>$id,
                    'nombre'=>$nombre,
                    'cantidad'=>$cantidad,
                    'precio'=>$precio,
                );

                $_SESSION['carrito'][$NumeroProductos]=$producto;
                $mensaje="";
                
            }
            }
            //$mensaje= print_r($_SESSION,true);
            
            break;

        case "Eliminar":
            if(is_numeric( $_POST['id'])){
            $id=$_POST['id'];
            
        foreach($_SESSION['carrito'] as $indice=>$producto){
            if($producto['id']==$id){
                unset($_SESSION['carrito'][$indice]);
                //echo "<script>alert('Elemento borrado');</script>";
                $mensaje="";
            }
        }
            }else{
            $mensaje.="id incorrecto...".$id;
       }

        break;
    }
}




?>